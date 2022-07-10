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
        {{-- <ul class="nav nav-tabs nav-justified my-3">
            <li class="nav-item">
                <a class="nav-link text-muted active" href="">新着順</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" href="">人気順</a>
            </li>
        </ul> --}}
        @include('articles.article-list')
    </div>
@endsection
