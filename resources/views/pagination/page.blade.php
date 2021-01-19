@if ($paginator->lastPage() > 1)
    <div class="pagination">

            <a href="{{ $paginator->url(1) }}">&laquo;</a>

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)

                <a href="{{ $paginator->url($i) }}" class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>

        @endfor

            <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">&raquo;</a>

    </div>
@endif
