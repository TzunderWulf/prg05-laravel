@extends('layouts.main')
@section('head-data')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row mx-auto mb-4">
            <div class="col me-3 border">
                <div class="mt-2 mb-4 pt-3 border-bottom border-primary border-2">
                    <h1 class="h2">Latest changes on the archive</h1>
                </div>
                <table id="latestChanges" class="table table-hover table-responsive align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Character</th>
                            <th scope="col">Created by</th>
                            <th scope="col">Modified date</th>
                            <th scope="col" class="w-25"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($latestChanges as $change)
                        <tr>
                            <td>{{ $change->first_name }} {{ $change->last_name }}</td>
                            <td>{{ $change->creator_name }}</td>
                            <td>{{ $change->updated_at }}</td>
                            <td>
                                <a href="/characters/{{$change->id}}" class="btn btn-outline-primary w-auto">
                                    See character <i class="bi bi-arrow-right-circle-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col col-lg-3 ms-3 border p-3">
                <div class="mx-auto text-center ">
                    <h1 class="h3 pb-3 border-bottom border-primary border-2">Create new character</h1>
                    <a href="/add" class="btn btn-outline-primary mt-3">Add new character to archive</a>
                </div>
            </div>
        </div>
        <div class="row mx-auto mb-4">
            <div class="col border">
                <div class="mt-2 mb-4 pt-3 border-bottom border-primary border-2">
                    <h1 class="h2">All characters currently on the archive</h1>
                </div>
                <table id="latestChanges" class="table table-hover table-responsive align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Character</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($characters as $character)
                        <tr>
                            <td>{{ $character->first_name }} {{ $character->last_name }}</td>
                            <td>
                                <input data-id="{{$character->id}}" class="toggle-class" type="checkbox"
                                       data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                       data-on="Active" data-off="Inactive"
                                    {{ $character->status ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="{{ route('character.edit', ['character' => $character]) }}" class="btn btn-outline-primary w-auto">
                                    Edit character <i class="bi bi-pencil-fill"></i>
                                </a>
                            </td>
                            <td>
                                <a href="/characters/{{$character->id}}" class="btn btn-outline-primary w-auto">
                                    See character <i class="bi bi-arrow-right-circle-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
