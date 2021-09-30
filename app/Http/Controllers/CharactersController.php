<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    public function index()
    {
        $characters = Character::where('active', '1')->get();

        return view('genshin-characters', compact('characters'));
    }

    public function show($id)
    {
        $character = Character::findOrFail($id);
        return view('characters.character', compact('character'));
    }
}
