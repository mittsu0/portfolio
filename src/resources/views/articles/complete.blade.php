@extends('app')
@section('title', '投稿完了 | ONEDARI - オネダリ -')

@section('content')
    @include('nav')
    <div class="container main-container">
        <h1 class="content-title text-center mb-4">投稿が完了しました</h1>
        <div class="d-flex justify-content-center gap-4">
            <a href="{{ route('articles.show', ['article' => $article_id]) }}" class="btn btn-main active link-item">投稿を見る</a>
            <a href="{{ route('articles.index') }}" class="btn btn-sub active link-item">ホーム画面へ</a>
        </div>
    </div>
    @include('footer')
@endsection
