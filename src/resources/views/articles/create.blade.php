@extends('app')
@section('title','オネダリを投稿する | ONEDARI - オネダリ -')

@section('content')
    @include('nav')
    <div class="container main-container">
        <h1 class="content-title">
            オネダリを投稿する
        </h1>
        <ul class="mb-2">
            @foreach ($errors->all() as $error)
                <li class="error">※{{$error}}</li>
            @endforeach
        </ul>
        <form action="{{route('articles.confirm')}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="タイトルを書く" value="{{old('title')}}">
            </div>
            <div class="d-sm-flex">
                <select class="custom-form-select me-2 mb-3" id="area" name="area" value="{{old('area')}}">
                    <option selected value="">エリアを選ぶ</option>
                    @foreach (config('pref') as $pref_id => $pref)
                        <option value="{{ $pref_id }}" @if((int)old('area') === $pref_id) selected @endif>{{ $pref }}</option>
                    @endforeach
                </select>
                <select class="custom-form-select mb-3" id="category" name="category" value="{{old('category')}}">
                    <option selected value="">カテゴリを選ぶ</option>
                    @foreach (config('category') as $category_id => $category)
                        <option value="{{ $category_id }}" @if((int)old('category') === $category_id) selected @endif>{{ $category }}</option>
                    @endforeach
                </select>
        
            </div>
            <div class="mb-2">
                <textarea class="form-control" name="body" placeholder="本文を書く">{{old('body')}}</textarea>
            </div>
            <image-preview-component></image-preview-component>
            <div class="mb-3">
                <label class="form-check-label">
                    <input type="hidden" name="can_display_id" value="0">
                    <input class="form-check-input" type="checkbox" name="can_display_id" value="1"
                        @if(old('can_display_id')) checked @endif>IDを表示する
                </label>
            </div>
            <button class="btn btn-sub w-50" type="submit">確認画面へ</button>
        </form>
    </div>
    @include('footer')
@endsection
