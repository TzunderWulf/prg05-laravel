@extends('layouts.main')

@section('content')
    <div class="mx-5 row">
        <div class="col-8 border m-2 p-3 align-self-start">
            <div class="text-center border-bottom border-primary border-3 mb-3">
                <h1>The Genshin Wiki</h1>
                <h2 class="h4 fst-italic">Find all the information needed!</h2>
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in purus in dui elementum vehicula id
                eu nisi. Mauris eu mi ut tellus laoreet egestas sed sit amet dui. Duis malesuada tortor vel ante ornare
                aliquam. Praesent bibendum cursus metus lacinia cursus. Fusce posuere mollis mauris sit amet faucibus.
                Mauris massa nisi, auctor eget tincidunt eget, egestas nec nunc.
            </p>
        </div>
        <div class="col-lg-3 m-2">
            <div class="card mb-3">
                <div class="card-header text-center">
                    <h1 class="h3">Latest addition</h1>
                </div>
                <div class="card-body">
                    <!-- img -->
                    <h2 class="h4">{{ $latestAddedCharacter['first_name'] }}</h2>
                    <p>character desc</p>
                    <a href="" class="btn btn-outline-primary">Read more...</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="h3">Latest edit</h1>
                </div>
                <div class="card-body">
                    <!-- -->
                    <h2 class="h4">{{ $latestEditedCharacter['first_name'] }}</h2>
                    <p>character desc</p>
                    <a href="" class="btn btn-outline-primary">Read more...</a>
                </div>
            </div>
        </div>
    </div>
@endsection
