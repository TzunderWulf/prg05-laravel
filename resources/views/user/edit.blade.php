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
                    <h1 class="h2">{{ Auth::user()->name }}</h1>
                    <h2 class="fst-italic h5">The fields with a star are required.</h2>
                </div>
                <form name="update-user-form" id="update-user-form"" method="post"
                      action="{{ route('update-user') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="username">Username*:</span>
                        <input class="form-control" type="text" name="username"
                               value="{{ Auth::user()->name }}" aria-label="Username" aria-describedby="username"
                               required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="email">E-Mail Address*:</span>
                        <input class="form-control" type="text" name="email"
                               value="{{ Auth::user()->email }}" aria-label="E-Mail Address" aria-describedby="email">
                    </div>
                    <div class="mb-3">
                        <a href="/password/reset" class="btn btn-outline-primary w-100">
                            Change password <i class="bi bi-key-fill"></i>
                        </a>
                    </div>
                    <div class="mb-3">
                        <a href="/home" class="btn btn-outline-danger w-100">
                            Discard changes <i class="bi bi-trash-fill"></i>
                        </a>
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-outline-success w-100" type="submit" name="submit" value="Update changes">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
