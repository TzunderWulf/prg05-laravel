@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7 border m-2 pb-3 align-self-start">
                <h1 class="h2 mt-3">{{ $character->first_name }} {{ $character->last_name }}</h1>
                <p class="lead"></p>
                <p>
                    {{ $character->description }}
                </p>
                <!-- foreach tag with character_id = id -->
                <a href="" class="btn btn-primary"></a>
            </div>
            <div class="col m-2">
                <div class="card border">
                    <div class="card-header text-center">
                        <h2 class="h3">{{ $character->first_name }}</h2>
                        <p class="h5">{{ $character->character_title }}</p>
                    </div>
                    <div class="card-body text-center py-5">
                        <ul class="list-group">
                            <li class="list-group-item"><img class="img-fluid" src="" alt=""></li>
                            <li class="list-group-item fw-bold">{{ $character->first_name }} {{ $character->last_name }}</li>
                            <li class="list-group-item fw-bold">{{ $character->city }}</li>
                            <li class="list-group-item fw-bold">{{ $character->element }}</li>
                            <li class="list-group-item fw-bold">{{ $character->birthday }}</li>
                            <!-- only available if u have deeper validation done -->
                            <li class="list-group-item fw-bold"><a href="" class="btn btn-outline-primary">Edit</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
