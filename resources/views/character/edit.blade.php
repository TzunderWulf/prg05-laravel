@extends('layouts.main')

@section('content')
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mx-3 mb-5 justify-content-center">
            <div class="col-lg-7 border rounded shadow p-4">
                <div class="mb-4 text-center">
                    <h1 class="h2">Edit {{ $character->first_name }} {{ $character->last_name }}</h1>
                    <h2 class="fst-italic h5">The fields with a star can't be empty.</h2>
                </div>
                <form name="add-character-form" id="add-character-form" method="post"
                      action="{{ route('store-edit', ['character' => $character]) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="first-name">First name*:</span>
                        <input class="form-control" type="text" name="first-name"
                               value="{{ $character->first_name }}" aria-label="First name" aria-describedby="first-name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="last-name">Last name:</span>
                        <input class="form-control" type="text" name="last-name"
                               value="{{ $character->last_name }}" aria-label="Last name" aria-describedby="last-name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="title">Secondary title*:</span>
                        <input class="form-control" type="text" name="title"
                               value="{{ $character->title }}" aria-label="Secondary title"
                               aria-describedby="title">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold">Description*:</span>
                        <textarea class="form-control" name="description" aria-label="Description">
                            {{ $character->description }}
                        </textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="birthday">Birthday*:</span>
                        <input class="form-control" type="text" name="birthday" value="{{ $character->birthday }}"
                               aria-label="Birthday" aria-describedby="birthday">
                    </div>
                    <div>
                        <div class="mb-3">
                            <p class="fw-bold" id="icon">Icon*:</p>
                            <input class="form-control" type="file" name="icon" aria-label="Icon image"
                                   aria-describedby="icon">
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold" id="portrait">Portrait*:</p>
                            <input class="form-control" type="file" name="portrait" aria-label="Portrait image"
                                   aria-describedby="portrait">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-outline-success w-100" type="submit" name="submit" value="Change character">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
