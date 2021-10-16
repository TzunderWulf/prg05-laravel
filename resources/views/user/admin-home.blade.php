@extends('layouts.main')

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
                            <th scope="col">Edited by</th>
                            <th scope="col">Modified date</th>
                            <th scope="col" class="w-25"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Character first name and last name</td>
                            <td>Either person who created it or edited it</td>
                            <td>Date and time of update</td>
                            <td>Go to character page</td>
                        </tr>
                        <tr>
                            <td>Diluc Ragnvindr</td>
                            <td>diluc</td>
                            <td>2021-10-09 14:00</td>
                            <td>
                                <a href="/characters/1" class="btn btn-outline-primary w-auto">
                                    See character <i class="bi bi-arrow-right-circle-fill"></i>
                                </a>
                            </td>
                        </tr>
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
                <p>All characters, filter characters on status.</p>
                <p>Be able to edit character for quality and content control.</p>
            </div>
        </div>
    </div>
@endsection
