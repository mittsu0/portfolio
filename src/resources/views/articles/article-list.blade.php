    <li class="mb-2 article-list py-2 position-relative link-item">
        @empty($article->image)
            <img class="article-list-image" src="{{ asset('images/no_image.png') }}" alt="" class="src">
        @else
            <img class="article-list-image" src="{{ Storage::disk('s3')->url('export/upload/' . $article->image) }}"
                alt="" class="src">
        @endempty
        <div class="ms-2 w-100">
            <div class="article-list-header">
                <span class="me-2">{{ $article->created_at->isoFormat('YYYY/MM/DD(ddd) HH:mm:ss') }}</span>
                <span>{{ config("pref.{$article->area}") }}</span>
            </div>
            <div>
                <p>
                    <span class="article-list-title fw-bold">{{ $article->title }}</span>
                </p>
            </div>
            <div class="article-list-footer d-flex">
                <div class="me-3 article-list-icon">
                    <i class="far fa-comment me-1"></i>
                    <span>{{ $article->comments_count }}</span>
                </div>
                <div href="" class="me-3 main-color">
                    <i class="far fa-laugh-beam me-1"></i>
                    <span>{{ $article->goods_count }}</span>
                </div>
                <div href="" class="sub-color">
                    <i class="far fa-meh me-1"></i>
                    <span>{{ $article->bads_count }}</span>
                </div>
            </div>
        </div>
        <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="link"></a>
    </li>
