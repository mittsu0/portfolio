@extends('app')
@section('title', '投稿内容の確認 | ONEDARI - オネダリ -')

@section('content')
    @include('nav')
    <div class="container main-container">
        <h1 class="content-title">
            投稿内容の確認
        </h1>
        <div>
            <div class="d-flex gap-3 article-wrap">
                @if (isset($data['image']))
                    <img src="{{ Storage::disk('s3')->url('temp/' . $data['image']) }}" class="article-image"
                        alt="">
                @else
                    <img src="{{ asset('images/no_image.png') }}" class="article-image" alt="">
                @endif
                <div>
                    <div class="article-list-header mb-2">
                        <span class="me-2">エリア＞{{ config("pref.{$data['area']}") }}</span>
                        <span>カテゴリ＞{{ config("category.{$data['category']}") }}</span>
                    </div>
                    <h2 class="article-title">{{ $data['title'] }}</h2>
                </div>
            </div>
        </div>
        <div class="body-wrap">
            <div class="article-list-header d-sm-flex gap-2 mb-2">
                <span>1.　ID:</span>
                @if ($data['can_display_id'])
                    <span>表示する</span>
                @else
                    <span>非表示</span>
                @endif
            </div>
            <div>
                <p class="mb-2">{{ $data['body'] }}</p>
                @if (isset($data['image']))
                    <img src="{{ Storage::disk('s3')->url('temp/' . $data['image']) }}" class="w-100" alt="">
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center gap-4">
            <form method="post" action="{{ route('articles.store') }}">
                @csrf
                <input type="hidden" name="title" value='{{ $data['title'] }}'>
                <input type="hidden" name="area" value='{{ $data['area'] }}'>
                <input type="hidden" name="category" value='{{ $data['category'] }}'>
                <input type="hidden" name="body" value='{{ $data['body'] }}'>
                <input type="hidden" name="can_display_id" value='{{ $data['can_display_id'] }}'>
                @isset($data['image'])
                    <input type="hidden" name="image" value='{{ $data['image'] }}'>
                @endisset
                <button type="submit" class="btn-grey link-item me-4" name="back">編集する</button>
                <button type="submit" class="btn btn-sub">投稿する</button>
            </form>
        </div>
    </div>
    @include('footer')
@endsection
