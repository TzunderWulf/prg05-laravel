<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenshinCharacterController extends Controller
{
    public function returnCharacters()
    {
        // character list
        $characters = [
            [
                'name' => 'Kaeya',
                'element' => 'Cryo',
                'city' => 'Mondstadt'
            ],
            [
                'name' => 'Diluc',
                'element' => 'Pyro',
                'city' => 'Mondstadt'
            ],
            [
                'name' => 'Jean',
                'element' => 'Anemo',
                'city' => 'Mondstadt'
            ],
        ];

        // returns the view with list
        return view('genshin-characters', compact('characters'));
    }
}
