<ul class="mt-3">
    @for($i=0; $i<15; $i++)
    <li class="mb-2 article-list">
        <img class="article-list-image" src="{{ asset('images/no_image.png') }}" alt="" class="src">
        <div class="ms-2 article-list-body">
            <div class="article-list-header">
                <span class="me-2">2022/6/30(月) 22:00</span>
                <span>岩手県</span>
            </div>
            <div>
                <p>
                    <a href="">岩手県花巻市に、夜に利用できるカフェが欲しい！！</a>
                </p>
            </div>
            <div class="article-list-footer">
                <a href="" class="me-3">
                    <i class="far fa-comment me-1"></i>
                    <span>10</span>
                </a>
                <a href="" class="me-3">
                    <i class="far fa-laugh-beam me-1"></i>
                    <span>10</span>
                </a>
                <a href="">
                    <i class="far fa-meh me-1"></i>
                    <span>10</span>
                </a>
            </div>
        </div>
    </li>
    @endfor
</ul>
