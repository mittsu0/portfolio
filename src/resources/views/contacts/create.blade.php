@extends('app')
@section('title','お問い合わせ | ONEDARI - オネダリ -')

@section('content')
    @include('nav')
    <div class="container main-container">
        <h1 class="content-title">
            お問い合わせ
        </h1>
        <ul class="mb-2">
            @foreach ($errors->all() as $error)
                <li class="error">※{{$error}}</li>
            @endforeach
        </ul>
        <form action="{{route('contacts.confirm')}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <p>メールアドレス</p>
                <input type="email" name="email" class="form-control" value="{{old('email')}}">
            </div>
            <div class="mb-2">
                <p>タイトル</p>
                <input type="text" name="title" class="form-control" value="{{old('title')}}">
            </div>
            <div class="mb-3">
                <p>お問い合わせ内容</p>
                <textarea class="form-control" name="content">{{old('content')}}</textarea>
            </div>
            <button class="btn btn-sub w-50" type="submit">確認画面へ</button>
        </form>
    </div>
    @include('footer')
@endsection
