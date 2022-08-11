@if ($paginator->hasPages())
    @php
        $first_page= 1;
        $last_page= $paginator->lastPage();
        $current_page= $paginator->currentPage();
    @endphp
        <nav>
            <ul class="pagination">
                @if($last_page <= 7)
                    @for($i = $first_page; $i <= $last_page; $i++)
                        <li class="page-item @if($i === $current_page) active @endif">
                            <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                @else
                    @if($current_page <= $first_page + 3)
                        @for($i = $first_page; $i <= $first_page + 4; $i++)
                            <li class="page-item @if($i === $current_page) active @endif">
                                <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                            </li>
                        @endfor
                        <li aria-disabled="true" class= "page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                        <li class="page-item">
                            <a href="{{ $paginator->url($last_page) }}" class="page-link">{{ $last_page }}</a>
                        </li>
                    @elseif($current_page >= $last_page - 3)
                        <li class="page-item">
                            <a href="{{ $paginator->url($first_page) }}" class="page-link">{{ $first_page }}</a>
                        </li>
                        <li aria-disabled="true" class= "page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                        @for($i = $last_page - 4; $i <= $last_page; $i++)
                            <li class="page-item @if($i === $current_page) active @endif">
                                <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                            </li>
                        @endfor
                    @else
                        <li class="page-item">
                            <a href="{{ $paginator->url($first_page) }}" class="page-link">{{ $first_page }}</a>
                        </li>
                        <li aria-disabled="true" class= "page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                        @for($i = $current_page-1; $i <= $current_page+1; $i++)
                            <li class="page-item @if($i === $current_page) active @endif">
                                <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                            </li>
                        @endfor
                        <li aria-disabled="true" class= "page-item disabled">
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
