@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mx-3 mb-5">
            <div class="col-8 border border-1">
                <div class="text-center mt-2 mb-4 border-bottom border-primary border-2">
                    <h1 class="h2">The Genshin Impact Archive</h1>
                    <h2 class="h5 mb-3">Find all the information you need</h2>
                </div>
                <div class="">
                    <p>
                        This archive contains the characters within the game and shows all the essential information
                        per character.
                    </p>
                    <p>
                        Genshin Impact is a free-to-play action RPG developed and published by miHoYo. The game
                        features a fantasy open-world environment and action based combat system using elemental
                        magic, character switching, and gacha monetization system for players to obtain new characters,
                        weapons, and other resources. The game can only be played with an internet connection and
                        features a limited multiplayer mode allowing up to four players in a world.
                    </p>

                    <img class="img-fluid img-thumbnail"
                         src="https://cdn.pixelvault.nl/wp-content/uploads/2020/10/Genshin_Impact__Keyart.jpg"
                         alt="Genshin Impact">
                </div>
            </div>
            <div class="col">
                <div class="card mb-3 text-center">
                    @if(isset($latestAdd))
                        <div class="card-header">
                            <h1 class="h3 card-title">Latest addition</h1>
                            <h2 class="h4 card-subtitle">{{ $latestAdd->first_name }} {{ $latestAdd->last_name }}</h2>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/uploads/' . $latestAdd->icon) }}"
                                 alt="{{ $latestAdd->first_name }} {{ $latestAdd->last_name }}">
                            <a href="{{ route('character.show', ['character' => $latestAdd]) }}"
                               class="btn btn-outline-primary w-100">
                                Read more <i class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </div>
                    @else
                        <h1 class="h3">No characters have been added yet.</h1>
                    @endif
                </div>
                <div class="card text-center">
                    @if(isset($latestEdit))
                        <div class="card-header">
                            <h1 class="h3 card-title">Latest edit</h1>
                            <h2 class="h4 card-subtitle">{{ $latestEdit->first_name }} {{ $latestEdit->last_name }}</h2>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/uploads/' . $latestEdit->icon) }}"
                                 alt="{{ $latestEdit->first_name }} {{ $latestEdit->last_name }}">
                            <a href="{{ route('character.show', ['character' => $latestEdit]) }}"
                               class="btn btn-outline-primary w-100">
                               Read more <i class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </div>
                    @else
                        <h1 class="h3">No characters have been edited yet.</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
