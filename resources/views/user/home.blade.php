@extends('layouts.main')
@section('head-data')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row mx-3 mb-5">
            <div class="col-8 border rounded border-1">
                <div class="text-center mt-2 mb-4 border-bottom border-primary border-2">
                    <h1 class="h2">Favourites</h1>
                    <h2 class="h5 mb-3">All of your favourites in one place</h2>
                </div>
                @if (count($favorites) > 0)
                    <table class="table table-hover table-responsive align-middle">
                        <thead>
                        <tr>
                            <th scope="col" class="w-25"></th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($favorites as $favorite)
                            <tr>
                                <td>
                                    <img class="img-fluid" src="{{ asset('storage/uploads/' . $favorite->icon) }}"
                                         alt="{{ $favorite->first_name }} {{ $favorite->last_name }}">
                                </td>
                                <td>{{ $favorite->first_name }} {{ $favorite->last_name }}</td>
                                <td>
                                    <a href="/characters/{{ $favorite->id }}" class="btn btn-outline-primary">
                                        See character <i class="bi bi-arrow-right-circle-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2 class="h4 text-center">No favourites yet.</h2>
                @endif
                <div class="text-center mt-2 mb-4 pt-3 border-bottom border-primary border-2">
                    <h1 class="h2">Created characters</h1>
                    <h2 class="h5 mb-3">All characters created by user: {{ Auth::user()->name }}</h2>
                </div>
                @if (count($createdCharacters) > 0)
                    <table id="createdCharacterTable" class="table table-hover table-responsive align-middle">
                        <thead>
                        <tr>
                            <th scope="col" class="w-25"></th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                            <th scope="col" class="text-center">Active?</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($createdCharacters as $createdCharacter)
                            <tr>
                                <td>
                                    <img class="img-fluid" src="{{ asset('storage/uploads/' . $createdCharacter->icon) }}"
                                         alt="{{ $createdCharacter->first_name }} {{ $createdCharacter->last_name }}">
                                </td>
                                <td>{{ $createdCharacter->first_name }} {{ $createdCharacter->last_name }}</td>
                                <td>
                                    <a href="{{ route('edit', ['character' => $createdCharacter]) }}"
                                       class="btn btn-outline-primary">Edit character
                                        <i class="bi bi-arrow-right-circle-fill"></i>
                                    </a>
                                </td>
                                <td>
                                    <input data-id="{{$createdCharacter->id}}" class="toggle-class" type="checkbox"
                                           data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                           data-on="Active" data-off="Inactive"
                                           {{ $createdCharacter->status ? 'checked' : '' }}>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <h2 class="h4 text-center">No created characters yet.</h2>
                            <h2 class="h6 fst-italic text-center px-3">
                                To be able to create characters, you need at least five favourites. You currently
                                have {{ count($favorites) }} favourites.
                            </h2>
                        @endif
                        </tbody>
                    </table>
            </div>
            <div class="col">
                @if (Route::has('login'))
                    @auth
                        <div class="card text-center mb-3">
                            <div class="card-header">
                                <h1 class="h3 card-title">{{ Auth::user()->name }}</h1>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="name">Name</span>
                                    <input type="text" class="form-control" aria-label="Name" aria-describedby="name"
                                           value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="name">E-mail</span>
                                    <input type="text" class="form-control" aria-label="Name" aria-describedby="name"
                                           value="{{ Auth::user()->email }}" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="name">Role</span>
                                    <input type="text" class="form-control" aria-label="Name" aria-describedby="name"
                                           readonly
                                           @switch(Auth::user()->role)
                                                @case(1)
                                                    value="Editor"
                                                    @break
                                                @case(2)
                                                    value="Admin"
                                                    @break
                                                @default
                                                    value="User"
                                                    @break
                                           @endswitch
                                           >
                                </div>
                                <a href="" class="btn btn-outline-primary w-100">Edit user <i class="bi bi-pencil-fill"></i></a>
                            </div>
                        </div>
                    @endauth
                @endif
                @if (count($favorites) >= 5 || Auth::user()->role == 2)
                    <div class="border rounded text-center py-4 mb-3">
                        <a href="/add" class="btn btn-outline-primary w-auto">Add new character to archive</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
