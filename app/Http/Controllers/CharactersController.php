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
        // Validate if user is allowed on page, based on the amount of favorites
        // Show the create page or redirect
    }

    public function store(Request $request)
    {
        // Validate the data coming out of the form
        // Save the file locally in the storage/public folder in an 'uploads' folder
        // Store the entire record
        // If record saved, send success notification otherwise notify user to try again
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
