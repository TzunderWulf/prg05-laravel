<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title = "About Us";

        $characters = [
          [
              'name' => 'Diluc',
              'element' => 'Pyro'
          ],
          [
              'name' => 'Kaeya',
              'element' => 'Cryo'
          ]
        ];

        return view('about', compact('title', 'characters'));
    }
}
