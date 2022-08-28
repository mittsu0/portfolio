@extends('app')
@section('title', 'お問い合わせ内容の確認 | ONEDARI - オネダリ -')

@section('content')
    @include('nav')
    <div class="container main-container">
        <h1 class="content-title">
            お問い合わせ内容の確認
        </h1>
        <div class="contact-body-wrap">
            <div class="mb-2">
                <p class="fw-bold">メールアドレス</p>
                <p>{{ $data['email'] }}</p>
            </div>
            <div class="mb-2">
                <p class="fw-bold">タイトル</p>
                <p>{{ $data['title'] }}</p>
            </div>
            <div>
                <p class="fw-bold">お問い合わせ内容</p>
                <p>{{ $data['content'] }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-4">
            <form method="post" action="{{ route('contacts.complete') }}">
                @csrf
                <input type="hidden" name="email" value="{{ $data['email'] }}">
                <input type="hidden" name="title" value="{{ $data['title'] }}">
                <input type="hidden" name="content" value="{{ $data['content'] }}">
                <button type="submit" class="btn-grey link-item me-4" name="back">編集する</button>
                <button type="submit" class="btn btn-sub">送信する</button>
            </form>
        </div>
    </div>
    @include('footer')
@endsection
