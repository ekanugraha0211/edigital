@extends('umkm.layouts.main')
@section('container')
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Kontak</h2>
        <p>Selamat data di layanan pelanggan kami. Kami siap membantu anda dengan segala pertanyaan atau masalah yang anda miliki.</p>     </div>

      <div class="row gx-lg-0 gy-4">

        <div class="col-lg-4">

          <div class="info-container d-flex flex-column align-items-center justify-content-center">
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Alamat:</h4>
                <p>Dinas Komunikasi dan Informatika Jl. KH Mansyur No. 71 Sumenep</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email:</h4>
                <p>kominfo.sumenep@gmail.com</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>WhatsApp:</h4>
                <p>+62 877-1237-7783</p>
              </div>
            </div><!-- End Info Item -->

            <!-- End Info Item -->
          </div>

        </div>

        <div class="col-lg-8">
          
          
          <form action="/kontak/input" method="POST" role="form" class="php-email-form"     >
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama anda" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email anda" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Judul pesan" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="pesan" rows="7" placeholder="Isi pesan" required></textarea>
            </div>
            @if(session('success'))

          <script>
            alert("Pesan Adan Sukses Terkirim !");
          </script>
          @endif
          
          @if(session('gagal'))
          <div class="alert alert-danger">
              {{ session('gagal') }}
          </div>
          <script>
            // Show failure alert
            alert("{{ session('gagal') }}");
          </script>
          @endif
            <div class="text-center"><button type="submit">Kirim</button></div>
          </form>
          
        </div><!-- End Contact Form -->

      </div>

    </div>
  </section><!-- End Contact Section -->
  @endsection