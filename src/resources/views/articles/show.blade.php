@extends('app')
@section('title', 'index')

@section('content')
    @include('nav')
    <div class="container main-container">
        <div class="article-wrap">
            <div class="article-list-header mb-1">
                <span class="me-2">エリア＞{{config("pref.{$article->area}")}}</span>
                <span>カテゴリ＞{{config("category.{$article->category}")}}</span>
            </div>
            <div class="d-flex gap-3 mb-2">
                @empty($article->image)
                    <img src="{{ asset('images/no_image.png') }}" class="article-image" alt="">
                @else
                    <img src="{{ asset('storage/UploadedFiles/'.$article->image) }}" class="article-image" alt="">
                @endif
                <div>
                    <div class="article-comment">
                        <i class="far fa-comment"></i>
                        <span>10件のコメント</span>
                    </div>
                    <h2 class="article-title mb-2">{{$article->title}}</h2>
                </div>
            </div>
            @include('good-bad.good-bad')
        </div>
        <div class="body-wrap">
            <div class="article-list-header mb-2">
                <span>1.　ID:</span>
                @if($article->can_display_id)
                    <span>{{ $article->uid }}</span>
                @else
                    <span>非表示</span>
                @endif
                <span class="ms-2">{{ $article->created_at }}</span>
            </div>
            <div>
                <p class="mb-2">{{$article->body}}</p>
                @if(!empty($article->image))
                    <img src="{{asset('storage/UploadedFiles/'.$article->image)}}" class="w-100" alt="">
                @endif
            </div>
        </div>
        @php $comment_number=2 @endphp
        @foreach($comments as $comment)
            @include('comments.comment')
            @php $comment_number++ @endphp
        @endforeach
        @include('comments.form')
    </div>
@endsection