<div class="blog-pagination">
          <ul class="pagination justify-content-center">
              {{-- Previous Page Link --}}
              @if ($produk->onFirstPage())
                  <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
              @else
                  <li class="page-item"><a href="{{ $produk->previousPageUrl() }}" class="page-link" rel="prev">&laquo;</a></li>
              @endif
      
              {{-- Pagination Elements --}}
              @for ($i = 1; $i <= $produk->lastPage(); $i++)
                  @if ($i == $produk->currentPage())
                      <li class="page-item active"><span class="page-link bg-success">{{ $i }}</span></li>
                  @else
                      <li class="page-item"><a href="{{ $produk->url($i) }}" class="page-link">{{ $i }}</a></li>
                  @endif
              @endfor
      
              {{-- Next Page Link --}}
              @if ($produk->hasMorePages())
                  <li class="page-item"><a href="{{ $produk->nextPageUrl() }}" class="page-link" rel="next">&raquo;</a></li>
              @else
                  <li class="page-item disabled"><span class="page-link ">&raquo;</span></li>
              @endif
          </ul>
      </div>