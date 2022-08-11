<div class="body-wrap">
    <div class="article-list-header mb-2">
        <span>{{$comment_number}}.　ID:</span>
        @if($comment->can_display_id)
            <span>{{ $comment->uid }}</span>
        @else
            <span>非表示</span>
        @endif
        <span class="ms-2">{{ $comment->created_at->isoFormat('YYYY/MM/DD(ddd) HH:mm:ss') }}</span>
    </div>
    <div>
        <p class="px-2">{{$comment->comment}}</p>
    </div>
</div>