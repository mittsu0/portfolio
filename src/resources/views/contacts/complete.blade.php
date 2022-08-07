@extends('app')
@section('title','送信完了 | ONEDARI - オネダリ -')

@section('content')
    @include('nav')
    <div class="container main-container">
        <h1 class="content-title text-center mb-4">お問い合わせを受け付けました</h1>
        <div class="d-flex justify-content-center">
            <a href="{{route('articles.index')}}" class="btn btn-sub">ホーム画面へ</a>
        </div>
    </div>
    @include('footer')
@endsection