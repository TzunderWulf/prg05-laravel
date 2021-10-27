@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mx-3 mb-5">
            <div class="col-7 border rounded m-2 pb-3 align-self-start">
                <h1 class="h2 mt-3">{{ $character->first_name }} {{ $character->last_name }}</h1>
                <p>{{ $character->description }}</p>
                @if(count($tags) !== 0)
                    @foreach($tags as $tag)
                        <a href="http://127.0.0.1:8000/characters?tags%5B%5D={{$tag->id}}" class="btn btn-primary">{{ $tag->name }}</a>
                    @endforeach
                @endif
            </div>
            <div class="col m-2">
                <div class="card border">
                    <div class="card-header text-center">
                        <h2 class="h3">{{ $character->first_name }}</h2>
                        <p class="h5">{{ $character->title }}</p>
                    </div>
                    <div class="card-body text-center py-2">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <img class="img-fluid w-75 h-75"
                                     src="{{ asset('storage/uploads/' . $character->portrait) }}"
                                     alt="{{ $character->first_name }} {{ $character->last_name }}">
                            </li>
                            <li class="list-group-item fw-bold">
                                {{ $character->first_name }} {{ $character->last_name }}
                            </li>
                            <li class="list-group-item fw-bold">Resides in the nation of {{ $character->region }}</li>
                            <li class="list-group-item fw-bold">In control of the {{ $character->element }} element</li>
                            <li class="list-group-item fw-bold">{{ $character->birthday }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
