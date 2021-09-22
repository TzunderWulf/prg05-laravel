<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title = "About This Website";

        $aboutWebsiteText = "This website is all about Genshin characters. Genshin Impact is an open-world RPG game,
                       developed by Mihoyo Co., Ltd. Within the world there are different characters, obtainable
                       trough a Gacha system. Favorite your favorite characters on this website!";

        $infoAboutWebsite = "This website is created as part of a uni project.";

        return view('about', compact('title', 'aboutWebsiteText', 'infoAboutWebsite'));
    }
}
