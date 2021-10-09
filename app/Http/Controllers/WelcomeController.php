<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Get the latest added and edited characters out of the database
        $latestEditedCharacter = Character::all()->sortByDesc('updated_at')->first();
        $latestAddedCharacter = Character::all()->sortByDesc('created_at')->first();

        // Return data to view, to show on welcome page
        return view('welcome', compact('latestEditedCharacter', 'latestAddedCharacter'));
    }
}
