@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <h1>All characters currently in the archive</h1>
            <h2 class="h5">Total amount: {{ count($characters) }}</h2>
        </div>
        <form method="post">
            <div class="row mb-5 mx-auto align-items-center">
                <div class="col col-auto">
                    <p class="h5">Filter:</p>
                </div>
                <div class="col col-auto">
                    <input type="checkbox" class="btn-check" id="tag-1" value="Mondstadt" autocomplete="off">
                    <label class="btn btn-outline-primary" for="tag-1">Mondstadt</label>
                </div>
                <div class="col col-auto">
                    <input type="checkbox" class="btn-check" id="tag-2" value="Liyue" autocomplete="off">
                    <label class="btn btn-outline-primary" for="tag-2">Liyue</label>
                </div>
                <div class="col col-auto">
                    <input type="checkbox" class="btn-check" id="tag-3" value="Pyro" autocomplete="off">
                    <label class="btn btn-outline-primary" for="tag-3">Pyro</label>
                </div>
                <div class="col col-auto">
                    <input type="checkbox" class="btn-check" id="tag-4" value="Cryo" autocomplete="off">
                    <label class="btn btn-outline-primary" for="tag-4">Cryo</label>
                </div>
                <div class="col col-auto">
                    <input type="checkbox" class="btn-check" id="tag-5" value="Male" autocomplete="off">
                    <label class="btn btn-outline-primary" for="tag-5">Male</label>
                </div>
                <div class="col input-group border-start border-primary border-3">
                    <span class="input-group-text" id="search"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" aria-label="Search for tag" aria-describedby="search">
                </div>
                <div class="col col-auto">
                    <input type="submit" class="btn btn-outline-success" value="Search">
                </div>
            </div>
        </form>
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
                                @if (Route::has('login'))
                                    @auth
                                        <div class="col-auto">
                                            <button class="btn btn-lg border border-0">
                                                <i class="bi bi-star"></i>
                                            </button>
                                        </div>
                                    @endauth
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-bold">{{ \Illuminate\Support\Str::limit($character->description, 120)  }}</p>
                            <a href="{{ route('character.show', ['character' => $character]) }}"
                               class="btn btn-outline-primary mb-3 w-100">
                                Read more <i class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
