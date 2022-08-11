@if ($paginator->hasPages())
    @php
        $link_count = 7;
        $middle_each_link_count = 1 + ($link_count - 7) / 2;
        $side_link_count = $link_count - 2;
        $first_page = 1;
        $last_page = $paginator->lastPage();
        $current_page = $paginator->currentPage();
    @endphp
    <nav>
        <ul class="pagination">
            @if ($last_page <= $link_count)
                @for ($i = $first_page; $i <= $last_page; $i++)
                    <li class="page-item @if ($i === $current_page) active @endif">
                        <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                @endfor
            @else
                {{-- 前半 --}}
                @if ($current_page < $side_link_count)
                    @for ($i = $first_page; $i <= $side_link_count; $i++)
                        <li class="page-item @if ($i === $current_page) active @endif">
                            <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                    <li aria-disabled="true" class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                    <li class="page-item">
                        <a href="{{ $paginator->url($last_page) }}" class="page-link">{{ $last_page }}</a>
                    </li>
                {{-- 後半 --}}
                @elseif($current_page > $last_page - $side_link_count + 1)
                    <li class="page-item">
                        <a href="{{ $paginator->url($first_page) }}" class="page-link">{{ $first_page }}</a>
                    </li>
                    <li aria-disabled="true" class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                    @for ($i = $last_page - $side_link_count + 1; $i <= $last_page; $i++)
                        <li class="page-item @if ($i === $current_page) active @endif">
                            <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                {{-- 中盤 --}}
                @else
                    <li class="page-item">
                        <a href="{{ $paginator->url($first_page) }}" class="page-link">{{ $first_page }}</a>
                    </li>
                    <li aria-disabled="true" class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                    @for ($i = $current_page - $middle_each_link_count; $i <= $current_page + $middle_each_link_count; $i++)
                        <li class="page-item @if ($i === $current_page) active @endif">
                            <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                    <li aria-disabled="true" class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                    <li class="page-item">
                        <a href="{{ $paginator->url($last_page) }}" class="page-link">{{ $last_page }}</a>
                    </li>
                @endif
            @endif
        </ul>
    </nav>
@endif
