@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <h1>All characters currently in the archive</h1>
            <h2 class="h5">Total amount: {{ count($characters) }}</h2>
        </div>
        <div class="row mx-auto mb-5">
            <div class="col col-auto">
                <form class="row">
                    @foreach ($newestTags as $tag)
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="tag-{{$tag->id}}" value="{{$tag->name}}"
                                   autocomplete="off">
                            <label class="btn btn-outline-primary" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="col">
                <form method="get" action="" class="row">
                    <div class="col input-group border-start border-primary border-3">
                        <span class="input-group-text" id="search"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" aria-label="Search for tag" aria-describedby="search"
                               name="search">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-outline-success" value="Search">
                    </div>
                </form>
            </div>
        </div>
        <div class="row row-cols-md-3 mb-5 mx-auto">
            @foreach($characters as $character)
                <div class="col-3 my-1">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ asset('storage/uploads/' . $character->icon) }}"
                                 alt="{{ $character->first_name }} {{ $character->last_name }}" class="w-75 h-75">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-auto">
                                    <h1 class="h3">{{ $character->first_name }} {{ $character->last_name }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-bold fst-italic">
                                {{ \Illuminate\Support\Str::limit($character->description, 120)  }}
                            </p>
                            <div class="mb-3">
                                <a href="{{ route('character.show', ['character' => $character]) }}"
                                   class="btn btn-outline-primary w-100 mb-3">
                                    Read more <i class="bi bi-arrow-right-circle-fill"></i>
                                </a>
                                @if (Route::has('login'))
                                    <a href="{{ route('character.favourite', ['character' => $character]) }}"
                                       class="btn w-100 @if($character->users->contains(Auth::id()))
                                           btn-warning @else btn-outline-warning @endif">
                                        @if ($character->users->contains(Auth::id()))
                                            Remove from favourites <i class="bi bi-star-fill"></i>
                                        @else
                                            Add to favourites <i class="bi bi-star"></i>
                                        @endif
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
