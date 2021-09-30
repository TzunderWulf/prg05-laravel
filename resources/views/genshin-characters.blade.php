@extends('layouts.main')

@section('content')
    <div class="mx-5">
{{--        <div class="mb-3">--}}
{{--            <h1>All characters in Genshin Impact</h1>--}}
{{--            <h2 class="h5">Current amount on the wiki: {{count($characters) }}</h2>--}}
{{--            <form method="post">--}}
{{--                <div class="input-group">--}}
{{--                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>--}}
{{--                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search term"--}}
{{--                           aria-describedby="basic-addon1">>--}}
{{--                </div>--}}
{{--                <input type="submit" class="btn btn-primary" value="Search">--}}
{{--            </form>--}}
{{--        </div>--}}
        <div class="row row-cols-3">
            @foreach($characters as $character)
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center">
                            <h1 class="h3">{{ $character->first_name }} {{ $character->last_name }}</h1>
                        </div>
                        <div class="card-body">
                            <p class="fw-bold">{{ \Illuminate\Support\Str::limit($character->description, 130) }} </p>
                            <a href="/characters/{{ $character->id }}" class="btn btn-outline-primary mb-3">
                                Read more...
                            </a>
{{--                            @if(auth::check())--}}
{{--                                <form id="favorite" method="post" action="/characters/{{ $character->id }}">--}}
{{--                                    <input type="hidden" name="favorite" value="1">--}}
{{--                                    <input type="submit" class="btn btn-outline-success" value="Favorite">--}}
{{--                                </form>--}}
{{--                            @endif--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
