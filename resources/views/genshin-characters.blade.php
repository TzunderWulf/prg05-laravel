@extends('layouts.main')

@section('content')
    <div class="row row-cols-3 mx-5">
        @foreach($characters as $character)
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="h3">{{ $character['first_name'] }} {{ $character['last_name'] }}</h1>
                    </div>
                    <div class="card-body">
                        <p class="fw-bold">{{ \Illuminate\Support\Str::limit($character['description'], 130) }} </p>
                        <a href="/character={{ $character['id'] }}" class="btn btn-outline-primary">Read more...</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
