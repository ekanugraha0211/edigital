@extends('layouts.main')
@section('container')
  <section id="portfolio" class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>PRODUK UMKM SUMENEP</h2>
        <!-- <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia reprehenderit sunt deleniti</p> -->
      </div>

      {{-- <div class="portfolio-isotope d-flex flex-column" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100"> --}}

      <div class="portfolio-flters d-flex flex-row justify-content-center">
        <!-- Input pencarian menggunakan komponen form Bootstrap -->
        <input id="search-input" class="form-control me-2 w-75"  type="search" placeholder="Cari Produk" aria-label="Search">
      </select>
        <button id="search-button" class="btn btn-success" type="button">Cari</button>
      </div>
      
        
                           

      <section id="blog" class="blog">
        <div class="container" >
          {{-- @dd($produk) --}}
          <div class="row gy-4 posts-list">
            @forelse($produk->sortByDesc('id')->take(9) as $p)
            {{-- @if($p->umkm->sektorUsaha->nama == $title) --}}
            <div class="col-xl-4 col-md-6">
                <article class="post">
                  <div class="post-img" style="height: 200px; overflow: hidden;">
                    <img src="/{{ $p->foto1 }}" alt="Produk" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                
                    <p class="post-category">
                        <i class="bi bi-folder"></i> {{ $p->umkm->sektorUsaha->nama }}
                    </p>
                    <h2 class="title">
                        <a href="{{ route('produkdetail', $p->id) }}">{{ $p->nama_produk }}</a>
                    </h2>
                    <div class="d-flex align-items-center">
                        <div class="post-author-img flex-shrink-0 rounded-circle" style="width: 50px; height: 50px;">
                            <img src="/{{ $p->umkm->logo }}" alt="Logo UMKM" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                        </div>
                        <div class="post-meta ms-3">
                            <p class="post-author-list mb-0">
                                <i class="bi bi-person"></i> {{ $p->umkm->nama }}
                            </p>
                            <p class="post-author-list mb-0">
                                <i class="bi bi-geo-alt"></i> {{ $p->umkm->alamat }}
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            {{-- @endif --}}
            @empty
            <div class="col">
                <p>Produk tidak ditemukan.</p>
            </div>
            @endforelse
        </div>
        
  
        </div>
      </section><!-- End Portfolio Container -->

      </div>

    </div>
  </section><!-- End Portfolio Section -->
@endsection