@extends('layouts.main')

@section('content')
    <div class="mx-5 row">
        <div class="col-8 border m-2 p-3 ">
            <h1>{{$title}}</h1>
            <p>{{$aboutWebsiteText}}</p>
            <p>{{$infoAboutWebsite}}</p>
        </div>
    </div>
@endsection
