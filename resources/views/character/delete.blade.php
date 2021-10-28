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
            <div class="col-lg-7 border rounded border shadow p-4">
                <div class="mb-4 text-center">
                    <h1 class="h2">
                        Delete
                        @if($character->last_name)
                            {{ $character->first_name }} {{ $character->last_name}}?
                        @else
                            {{ $character->first_name }}?
                        @endif
                    </h1>
                    <h2 class="fst-italic h5">The changes cannot be reversed</h2>
                </div>
                <form name="add-character-form" id="add-character-form" method="post"
                      action="{{route('remove', ['character' => $character])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input class="btn btn-outline-success w-100" type="submit" name="submit"
                               value="Delete character">
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('home') }}" class="btn btn-outline-danger w-100" type="submit">Go back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
