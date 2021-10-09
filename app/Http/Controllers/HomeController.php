<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();

        $favorites = Character::leftJoin('character_user', 'character_user.character_id', '=', 'characters.id')
            ->where('user_id', Auth::id())
            ->get();

        $createdCharacters = Character::all()->where('created_by', $id);

        return view('home', compact('favorites', 'createdCharacters'));
    }
}
