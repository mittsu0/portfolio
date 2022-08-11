@extends('app')
@section('title', 'ONEDARI - オネダリ -')

@section('content')
    @include('nav')
    <div class="container main-container">
        <div class="mb-4">
            @isset($params)
                <div class="mb-2">
                    @foreach($params as $key => $param)
                        @if($key === 'area' && !empty($param))
                            <span class="me-2 article-list-header">{{__($key)}}＞{{config("pref.{$param}")}}</span>
                        @endif
                        @if($key === 'category' && !empty($param))
                            <span class="me-2 article-list-header">{{__($key)}}＞{{config("category.{$param}")}}</span>
                        @endif
                        @if($key === 'keyword' && !empty($param))
                            <h1 class="content-title mt-1">「{{$param}}」の検索結果</h1>
                        @endif
                    @endforeach
                </div>
            @endisset
            <ul class="d-flex gap-2">
                <li class="flex-grow-1">
                    <button type="submit" form="search"
                    class="btn btn-main w-100 @if(!isset($params['popularity'])) active @endif">新着順</button>
                </li>
                <li class="flex-grow-1">
                    <button type="submit" form="search" name="popularity" value="1"
                    class="btn btn-sub w-100 @isset($params['popularity']) active @endisset">人気順</button>
                </li>
            </ul>
        </div>
        <ul class="mb-3">
            @foreach($articles as $article)
                @include('articles.article-list')
            @endforeach
        </ul>
        <div class="d-flex justify-content-center">
            {{$articles->onEachSide(1)->links('articles.paginator')}}
        </div>
        {{-- @php dd($articles->onEachSide(1)->links('articles.paginator')) @endphp --}}
    </div>
    @include('footer')
@endsection
