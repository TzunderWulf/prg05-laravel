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
            <div class="col-lg-7 border border-2 shadow p-4">
                <div class="mb-4 text-center">
                    <h1 class="h2">Add new character to the archive</h1>
                    <h2 class="fst-italic h5">The fields with a star are required.</h2>
                </div>
                <form name="add-character-form" id="add-character-form" method="post" action="{{url('store-form')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="first-name">First name*:</span>
                        <input class="form-control" type="text" name="first-name"
                               placeholder="e.g. Diluc" aria-label="First name" aria-describedby="first-name"
                               required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="last-name">Last name:</span>
                        <input class="form-control" type="text" name="last-name"
                               placeholder="e.g. Ragnvindr" aria-label="Last name" aria-describedby="last-name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="title">Secondary title*:</span>
                        <input class="form-control" type="text" name="title"
                               placeholder="e.g. The Dark Side of Dawn" aria-label="Secondary title"
                               aria-describedby="title" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold">Description*:</span>
                        <textarea class="form-control" name="description" aria-label="Description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold" id="region">Select the region, the character resides*:</p>
                        <select class="form-select" name="region" aria-label="Select region, where character resides"
                                aria-describedby="region" required>
                            <option value="" selected>Select region</option>
                            <option value="Mondstadt">Mondstadt</option>
                            <option value="Liyue">Liyue</option>
                            <option value="Inazuma">Inazuma</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold" id="element">Select the element, the character controls*:</p>
                        <select class="form-select" name="element" aria-label="Select element, the character controls"
                                aria-describedby="element" required>
                            <option value="" selected>Select element</option>
                            <option value="Anemo">Anemo</option>
                            <option value="Geo">Geo</option>
                            <option value="Electro">Electro</option>
                            <option value="Dendro">Dendro</option>
                            <option value="Hydro">Hydro</option>
                            <option value="Pyro">Pyro</option>
                            <option value="Cryo">Cryo</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold" id="birthday">Birthday*:</span>
                        <input class="form-control" type="text" name="birthday" placeholder="e.g. April 30th"
                               aria-label="Birthday" aria-describedby="birthday" required>
                    </div>
                    <div class="mb-4">
                        <div class="mb-3">
                            <p class="fw-bold" id="icon">Icon*:</p>
                            <input class="form-control" type="file" name="icon" aria-label="Icon image"
                                   aria-describedby="icon" required>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold" id="portrait">Portrait*:</p>
                            <input class="form-control" type="file" name="portrait" aria-label="Portrait image"
                                   aria-describedby="portrait" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text fw-bold" id="tags">Tags*:</span>
                            <input class="form-control" type="text" name="tags" placeholder="e.g. tag-1, tag-2"
                                   aria-label="Tags, separate tags with a comma" aria-describedby="tags" required>
                        </div>
                        <p class="fst-italic">Seperate tags with comma, like so: Mondstadt, Male, Pyro</p>
                    </div>

                    <div class="mb-3">
                        <input class="btn btn-outline-success w-100" type="submit" name="submit" value="Add character">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
