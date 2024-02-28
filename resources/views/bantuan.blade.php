@extends('layouts.main')
@section('container')
<section id="faq" class="faq">
    <div class="container-fluid" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
          <div class="content px-xl-5">
            <h3 style="color: black">Tanya <strong>Jawab</strong></h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
            </p>
          </div>

          <div class="accordion accordion-flush px-xl-5" id="faqlist">

            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                  <i class="bi bi-question-circle question-icon"></i>
                  Apa itu E-Display?
                </button>
              </h3>
              <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                    E-Display adalah salah satu layanan yang disediakan oleh dinas komunikasi dan informatika Kabupaten Sumenep untuk masyarakat dengan tujuan memberikan informasi kepada individu yang membutuhkan produk serta untuk memberikan dukungan dan bantuan kepada Usaha Mikro, Kecil, dan Menengah (UMKM) di Sumenep.
                </div>
              </div>
            </div><!-- # Faq item-->

            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                  <i class="bi bi-question-circle question-icon"></i>
                  Apa tujuan E-Display?
                </button>
              </h3>
              <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                    Tujuan utama dari website ini adalah untuk memberikan dukungan kepada Usaha Mikro, Kecil, dan Menengah (UMKM) di Sumenep agar dapat berkembang, bersaing, dan maju sehingga dapat memberikan kontribusi positif dalam meningkatkan perekonomian Sumenep. Selain itu, website ini juga bertujuan untuk memperkenalkan kepada masyarakat luar potensi yang ada di Kabupaten Sumenep.
                </div>
              </div>
            </div><!-- # Faq item-->

            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                  <i class="bi bi-question-circle question-icon"></i>
                  Siapa saja yang bisa menggunakan E-Display? 
                </button>
              </h3>
              <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                    Yang bisa mengakses E-Display adalah para pelaku UMKM di Sumenep dengan cara mendaftarkan diri dan menempatkan produk-produk mereka di platform ini.
                </div>
              </div>
            </div><!-- # Faq item-->

            <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                  <i class="bi bi-question-circle question-icon"></i>
                  Apakah E-Display berbayar? 
                </button>
              </h3>
              <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                  <i class="bi bi-question-circle question-icon"></i>
                  E-display didesain untuk memberikan bantuan kepada masyarakat tanpa memungut biaya apa pun.
                </div>
              </div>
            </div><!-- # Faq item-->

            <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                  <i class="bi bi-question-circle question-icon"></i>
                  Bagaimana cara user menggunakan E-Display?
                </button>
              </h3>
              <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                    Langkah penggunaan e-display bagi para pelaku UMKM melibatkan proses pendaftaran melalui Kominfo, yang mencakup penyerahan informasi terkait nama produk dan detail lainnya. Setelah pendaftaran selesai, pengguna dapat mengunggah produk mereka ke platform, memungkinkan pengguna lain untuk menemukan dan menjelajahi produk tersebut di e-display.
                </div>
              </div>
            </div><!-- # Faq item-->

          </div>

        </div>

        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/faq.jpg");'>&nbsp;</div>
      </div>

    </div>
  </section><!-- End F.A.Q Section -->
  @endsection