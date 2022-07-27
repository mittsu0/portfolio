<h1 class="content-title" id="comment-link">
    コメントを投稿する
</h1>
<ul class="mb-3">
    @foreach ($errors->all() as $error)
        <li class="error">※{{$error}}</li>
    @endforeach
</ul>
<form action="{{route('comments.confirm', ['article' => $article->id])}}" class="" method="post">
    @csrf
    <div class="mb-2">
        <textarea class="form-control" name="comment" placeholder="コメントを書く">{{old('comment')}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-check-label">
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <input type="hidden" name="can_display_id" value="0">
            <input class="form-check-input" type="checkbox" name="can_display_id" value="1"
                @if(old('can_display_id')) checked @endif>IDを表示する
        </label>
    </div>
    <button class="btn btn-sub ms-2" type="submit">コメントを投稿する</button>
</form>