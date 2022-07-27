@extends('app')
@section('title', 'index')

@section('content')
    @include('nav')
    <div class="container main-container">
        <div>
            <ul class="d-flex gap-2">
                <li class="flex-grow-1">
                    <button type="submit" class="btn btn-main w-100">新着順</button>
                </li>
                <li class="flex-grow-1">
                    <button type="submit" class="btn btn-sub w-100">人気順</button>
                </li>
            </ul>
        </div>
        @include('articles.article-list')
    </div>
@endsection
