@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 rounded-border border border-2 m-2 pb-3">
                <h1>{{$title}}</h1>
                <p>{{$aboutWebsiteText}}</p>
                <p>{{$infoAboutWebsite}}</p>
            </div>
        </div>
    </div>
@endsection
