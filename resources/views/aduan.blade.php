@extends('layouts.main')
@section('container')
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Aduan</h2>
        <p>Selamat data di layanan pelanggan kami. Kami siap membantu anda dengan segala pertanyaan atau masalah yang anda miliki.</p>
      </div>
      <div class="row gx-lg-0 gy-4">
        <div class="col-lg-4">
          <div class="info-container d-flex flex-column align-items-center justify-content-center">
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Alamat:</h4>
                <p>Dinas Koperasi Usaha Kecil dan Menengah perindustrian dan Perdagangan Sumenep Jl. Urip Sumoharjo No. 6, Dusun Mastasek, Desa Pabian, Kec. Kota Sumenep, Sumenep 6941</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email:</h4>
                <p>diskopukmperiendag.sumenep@gmail.com</p>
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
          <form action="{{ route('aduan.store') }}" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Pesan anda telah terkirim</div>
            </div>
            <div class="text-center"><button type="submit">Kirim</button></div>
          </form>
        </div><!-- End Contact Form -->

      </div>

    </div>
  </section><!-- End Contact Section -->
  @endsection