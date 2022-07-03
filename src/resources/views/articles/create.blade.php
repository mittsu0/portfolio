@extends('app')

@section('content')
    @include('nav')
    <div class="container main-container">
        <div class="container main-container">
            @include('articles.article')
        </div>
    </div>
@endsection
