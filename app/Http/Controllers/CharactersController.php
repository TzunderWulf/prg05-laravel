<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterTag;
use App\Models\CharacterUser;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CharactersController extends Controller
{
    public function index()
    {
        // Index function to get all characters out of database, whose status is active
        $characters = Character::all()->where('status', '=', 1);

        return view('character.characters', compact('characters'));
    }

    public function show(Character $character)
    {
        // Get all the tags connected to the character
        $tags = Tag::leftJoin('character_tag', 'character_tag.tag_id', '=', 'tags.id')
            ->where('character_id', $character->id)
            ->get();

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
        $amountFavorites = CharacterUser::all()->where('user_id', Auth::id());

        // Validate if user is allowed on page, based on the amount of favorites or role
        if (count($amountFavorites) >= 5 || Auth::user()->role === 2)
        {
            // Show the create page
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
            'portrait' => 'required|image|mimes:jpeg,png'
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
            "created_by" => $userId
        ]);

        // If record saved, send success notification otherwise notify user to try again
        if ($character->save())
        {
            return redirect('/add')->with('status', 'Character added!');
        }
        return redirect('/add')->with('status', 'Something went wrong, try again.');
    }

    public function edit(Character $character)
    {
        // Check if user's id == the id of the characters creator
        if (Auth::id() == $character->created_by){
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
}
