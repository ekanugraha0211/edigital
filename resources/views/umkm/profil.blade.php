  @extends('umkm.layouts.main')

  @section('container')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero bg-white" >
  <div class="container bg-white p-5 rounded shadow-lg">
    <div class="row align-items-center">
      <!-- Business Logo -->
      <div class="col-md-3 text-center">
        <img src="https://via.placeholder.com/150" alt="Business Logo" class="rounded-circle img-fluid shadow">
      </div>
      
      <!-- Business Information -->
      <div class="col-md-9">
        <h1 class="display-5 fw-bold text-dark">{{$produk->nama_produk}}</h1>
        <p class="lead text-muted">Kategori: Kuliner | Kerajinan | Jasa | Produk Lokal</p>
        <p>UMKM kami bergerak di bidang [deskripsi singkat tentang bisnis, seperti produk unggulan, layanan, atau keunikan]. Dengan komitmen untuk memberikan produk berkualitas dan layanan terbaik, kami terus berinovasi untuk mendukung pelanggan dan komunitas.</p>
        
        <!-- Contact Information -->
        <div class="mt-3 d-flex gap-3">
          <a href="#" class="text-primary text-decoration-none">Instagram</a>
          <a href="#" class="text-primary text-decoration-none">Website</a>
          <a href="#" class="text-primary text-decoration-none">WhatsApp</a>
        </div>
      </div>
    </div>

    <!-- Additional Information Section -->
    <div class="row mt-5">
      <div class="col-md-6 mb-3">
        <div class="p-3 bg-light border rounded">
          <h5 class="text-primary">Produk Unggulan</h5>
          <ul class="list-unstyled text-muted">
            @foreach ($produk as $prod )
            <li>{{ $prod->nama_produk}}</li>
            @endforeach
            
            <li>Produk B - Deskripsi singkat</li>
            <li>Produk C - Deskripsi singkat</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="p-3 bg-light border rounded">
          <h5 class="text-primary">Layanan</h5>
          <ul class="list-unstyled text-muted">
            <li>Layanan A - Deskripsi singkat</li>
            <li>Layanan B - Deskripsi singkat</li>
            <li>Layanan C - Deskripsi singkat</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="p-3 bg-light border rounded">
          <h5 class="text-primary">Alamat</h5>
          <p class="text-muted">Jl. Contoh Alamat No. 123, Kabupaten Sumenep</p>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="p-3 bg-light border rounded">
          <h5 class="text-primary">Jam Operasional</h5>
          <p class="text-muted">Senin - Sabtu: 08.00 - 17.00</p>
        </div>
      </div>
    </div>

    <!-- Product Display Section -->
    <div class="container my-4">
           
        </div>
  </div>
  </section>
 

  <!-- End Hero Section -->
  @endsection