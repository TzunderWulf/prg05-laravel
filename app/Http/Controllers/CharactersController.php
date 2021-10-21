<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterTag;
use App\Models\CharacterUser;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CharactersController extends Controller
{
    public function index(Request $request)
    {
        if (!$request['search'])
        {
            // Get all characters out of database, whose status is active, if no search or tags is done/seen
            $characters = Character::all()
                ->where('status', '=', 1);
        }
        else
        {
            // Validate the input
            $validated = $request->validate([
                'search' => 'required|max:255'
            ]);

            // Do a query, based on the search
            $characters = Character::where('status', '=', 1)
                ->where('region', 'like', '%'.$validated['search'].'%')
                ->orWhere('first_name', 'like', '%'.$validated['search'].'%')
                ->orWhere('element', 'like', '%'.$validated['search'].'%')
                ->get();
        }
        // Get back the five newest tags added to the database
        $newestTags = Tag::latest()->take(5)->get();

        return view('character.characters', compact('characters', 'newestTags'));
    }

    public function show(Character $character)
    {
        // Get all the tags connected to the character
        $tags = Character::find($character->id);

        // Return the  view with character data and related tags
        return view('character.character', compact('character', 'tags'));
    }

    public function getLatest()
    {
        //  Get the latest edit and added character
        $latestAdd  = Character::all()
            ->where('status' ,'=', '1')
            ->sortByDesc('created_at')
            ->first();
        $latestEdit = Character::all()
            ->where('status' ,'=', '1')
            ->sortByDesc('updated_at')
            ->first();

        // Return data to the 'welcome' page
        return view('welcome', compact('latestAdd', 'latestEdit'));
    }

    public function create()
    {
        // Validate if user is allowed on page, based on the amount of favorites or role
        $amountFavorites = CharacterUser::all()->where('user_id', Auth::id());
        if (count($amountFavorites) >= 5 || Auth::user()->role === 2)
        {
            return view('character.create');
        }
        return redirect('/');
    }

    public function store(Request $request)
    {
        // Validate the data coming out of the form
        $validated = $request->validate([
            'first-name' => 'required|max:255',
            'last-name' => 'max:255',
            'title' => 'required|max:255',
            'description' => 'required',
            'region' => 'required',
            'element' => 'required',
            'birthday' => 'required|max:255',
            'icon' => 'required|image|mimes:jpeg,png',
            'portrait' => 'required|image|mimes:jpeg,png',
            'tags' => 'required|max:255',
        ]);

        // Save the file locally in the storage/public folder in an uploads folder
        $request->icon->store('uploads', 'public');
        $request->portrait->store('uploads', 'public');

        $userId = Auth::id();

        // Store the entire record
        $character = new Character([
            "first_name" => $validated['first-name'],
            "last_name" => $validated['last-name'],
            "title" => $validated['title'],
            "description" => $validated['description'],
            "region" => $validated['region'],
            "element" => $validated['element'],
            "birthday" => $validated['birthday'],
            "icon" => $validated['icon']->hashName(),
            "portrait" => $validated['portrait']->hashName(),
            "user_id" => $userId
        ]);

        // Make sure the character saves right
        if ($character->save()) {
            // Get all tags out of input and split them (by ',')
            $tagNames = explode(',', $validated['tags']);

            // For each tag, check if record exists in tags database
            foreach ($tagNames as $tagName) {
                // If not create new tag and get id
                $tag = Tag::where('name', '=', $tagName)->firstOrCreate([
                    'name' => $tagName
                ]);

                // Get tag_id and character_id, put them together in character_tag table
                $connBetweenCharacterTag = new CharacterTag([
                    'character_id' => $character->id,
                    'tag_id' => $tag->id
                ]);

                // Save the connection between the character and tag
                $connBetweenCharacterTag->save();
            }
            return redirect('/add')->with('status', 'Character added!');
        }
        return redirect('/add')->with('status', 'Something went wrong saving, try again.');
    }

    public function edit(Character $character)
    {
        // Check if user's id == the id of the characters creator
        if (Auth::id() == $character->user_id || Auth::user()->role === 2){
            return view('character.edit', compact('character'));
        }
        return redirect('/');
    }

    public function update(Character $character, Request $request)
    {
        // Validate the data coming out of the form
        $validated = $request->validate([
            'first-name' => 'required|max:255',
            'last-name' => 'max:255',
            'title' => 'required|max:255',
            'description' => 'required',
            'birthday' => 'required|max:255'
        ]);

        // Save the file locally, if new files have been added, in the storage/public folder in an uploads folder
        if ($request['icon'] !== null)
        {
            Storage::delete($character->icon);
            $validated = $request->validate([
                'icon' => 'required|image|mimes:jpeg,png'
            ]);
            $request->icon->store('uploads', 'public');
            $character->icon = $validated['icon']->hashName();
        }
        if ($request['portrait'] !== null)
        {
            Storage::delete($character->portrait);
            $validated = $request->validate([
                'portrait' => 'required|image|mimes:jpeg,png'
            ]);
            $request->portrait->store('uploads', 'public');
            $character->portrait = $validated['portrait']->hashName();
        }

        // Save all new values in the right column
        $character->first_name = $validated['first-name'];
        $character->last_name = $validated['last-name'];
        $character->title = $validated['title'];
        $character->description = $validated['description'];
        $character->birthday = $validated['birthday'];

        // If record saved, send success notification otherwise notify user to try again
        if ($character->save())
        {
            return redirect()->route('edit', ['character' => $character])->with('status', 'Character has been edited!');
        }
        return redirect()->route('edit', ['character' => $character])->with('status', 'Something went wrong, try again.');
    }

    public function changeStatus(Request $request)
    {
        $character = Character::findOrFail($request['character-id']);
        $character->status = $request->status;
        $character->save();
    }

    public function showLatestChanges()
    {
        if (Auth::user()->role === 2)
        {
            // Get the latest changes and add username of creator to show on the admin 'homepage'
            $latestChanges = Character::leftJoin('users', 'characters.user_id', '=', 'users.id')
                ->latest()
                ->select('users.name as creator_name', 'characters.*')
                ->limit(5)
                ->get();

            $characters = Character::all();

            return view('user.admin-home', compact('latestChanges', 'characters'));
        }
        return redirect('/');
    }
}
