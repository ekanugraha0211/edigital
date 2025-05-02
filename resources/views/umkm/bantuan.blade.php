@extends('umkm.layouts.main')
@section('container')

<section id="faq" class="faq">
    <div class="container-fluid" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
          <div class="content px-xl-5">
            <h3 style="color: black">Tanya <strong>Jawab</strong></h3>
            <p>
              Berikut ini adalah beberapa panduan yang disusun untuk membantu UMKM memahami fungsi dari e-display
            </p>
          </div>

          <div class="accordion accordion-flush px-xl-5" id="faqlist">

            @foreach ($data as $d)
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="{{ ($d->id * 100) +200 }}">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $d->id }}">
                  <i class="bi bi-question-circle question-icon"></i>
                  {{ $d->pertanyaan }}
                </button>
              </h3>
              <div id="faq-content-{{ $d->id }}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body">
                  {{ $d->jawaban }}  </div>
              </div>
            </div>
            @endforeach<!-- # Faq item-->

           

          </div>

        </div>

        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/faq.jpg");'>&nbsp;</div>
      </div>

    </div>
  </section><!-- End F.A.Q Section -->
  @endsection