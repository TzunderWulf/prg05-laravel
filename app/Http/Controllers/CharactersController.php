<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharactersController extends Controller
{
    public function index()
    {
        // Index function to get all character out of database

    }

    public function show()
    {
        // Show function to show one character's detail page
    }

    public function getLatest()
    {
        //  Get the latest edit and added character
        $latestAdd  = Character::all()->sortByDesc('created_at')->first();
        $latestEdit = Character::all()->sortByDesc('updated_at')->first();

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
            "first_name" => $request['first-name'],
            "last_name" => $request['last-name'],
            "title" => $request['title'],
            "description" => $request['description'],
            "region" => $request['region'],
            "element" => $request['element'],
            "birthday" => $request['birthday'],
            "icon" => $request['icon']->hashName(),
            "portrait" => $request['portrait']->hashName(),
            "created_by" => $userId
        ]);

        // If record saved, send success notification otherwise notify user to try again
        if ($character->save())
        {
            return redirect('/add')->with('status', 'Character added!');
        }
        return redirect('/add')->with('status', 'Something went wrong, try again.');
    }

    public function edit()
    {
        // Check if user's id == created_by, if not send away
        // Show page for editing character
    }

    public function update()
    {
        // Validates the data coming out of form
        // Checks if new images were sent trough
        // Validates the images and stores them, remove old ones and stores hashes in database
        // Store the rest of the data in database
    }

    public function changeStatus()
    {
        // Find the character in database
        // Change status, based on current one
    }
}
