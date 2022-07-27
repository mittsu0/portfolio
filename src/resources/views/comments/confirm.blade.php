@extends('app')

@section('content')
    @include('nav')
    <div class="container main-container">
        <h1 class="content-title">
            コメントの確認
        </h1>
        <div class="body-wrap">
            <div class="article-list-header d-sm-flex gap-2 mb-2">
                @if($data['can_display_id'])
                    <span>ID：表示する</span>
                @else
                    <span>ID：非表示</span>
                @endif
            </div>
            <div>
                <p>{{$data['comment']}}</p>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-4">
            <form method="post" action="{{route('comments.store',['article' => $data['article_id']])}}">
                @csrf
                <input type="hidden" name="article_id" value='{{$data['article_id']}}'>
                <input type="hidden" name="comment" value='{{$data['comment']}}'>
                <input type="hidden" name="can_display_id" value='{{$data['can_display_id']}}'>
                <button type="submit" class="btn-grey link-item me-4" name="back">編集する</button>
                <button type="submit" class="btn btn-sub">投稿する</button>
            </form>
        </div>
    </div>
@endsection