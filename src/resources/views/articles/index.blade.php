@extends('app')
@section('title', 'index')

@section('content')
    @include('nav')
    <div class="container main-container">
        <ul class="nav nav-tabs nav-justified my-3">
            <li class="nav-item">
                <a class="nav-link text-muted active" href="">新着順</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" href="">人気順</a>
            </li>
        </ul>
        @include('articles.article-list')
    </div>
@endsection
