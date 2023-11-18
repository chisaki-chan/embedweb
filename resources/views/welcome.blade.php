@extends('layouts.app')
@section('content')
<div class="h1 text-center text-dark" id="pageHeaderTitle">Capacity</div>
  <div class="text-center mb-10" style="max-width: 400px; margin: auto;">
    <canvas id="myChart" width="100" height="100"></canvas>
  </div>
  @foreach ($cards as $card)
  <section class="light">
    <div class="container py-2 pb-5">
      <div class="h1 text-center text-dark" id="pageHeaderTitle">Content</div>
  
      <article class="postcard light blue">
        <a class="postcard__img_link" href="#">
          <img class="postcard__img" src="{{ asset('fotopegawai/'.$card->foto) }}" alt="Image Title" />
        </a>
        <div class="postcard__text t-dark">
          <div class="postcard__subtitle small">
            <time datetime="2020-05-25 12:00:00">
              <i class="fas fa-calendar-alt mr-2"></i>{{ $card->created_at }}
            </time>
          </div>
          <div class="postcard__bar"></div>
          <div class="postcard__preview-txt">{{ $card->description }}</div>
        </div>
      </article>
    </div>
  </section>
  @endforeach

<div class="container">
  <div class="h1 text-center text-dark" id="pageHeaderTitle">Our Team</div>
  <div class="row text-center">

      <!-- Team item -->
      <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/nyun.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Keinanjung Ruswandi</h5><span class="small text-uppercase text-muted">Leader</span>
        </div>
    </div><!-- End -->

      <!-- Team item -->
      <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/vina.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Vina Puspitasari</h5><span class="small text-uppercase text-muted">Documentalist</span>
        </div>
    </div><!-- End -->

      <!-- Team item -->
      <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/nazz.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Fauzan Perdana Ilham</h5><span class="small text-uppercase text-muted">Designer</span>
        </div>
    </div><!-- End -->

      <!-- Team item -->
      <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/poy.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Muhammad Al-ghifari</h5><span class="small text-uppercase text-muted">Hardware Engineer</span>
          </div>
      </div><!-- End -->

            <!-- Team item -->
            <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
              <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/ran.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                  <h5 class="mb-0">Mohammad Iqsan Syachranie</h5><span class="small text-uppercase text-muted">Hardware and Software Engineer - Fullstack Developer</span>
              </div>
          </div><!-- End -->

                <!-- Team item -->
      <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/riz.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Rizky Alfazry</h5><span class="small text-uppercase text-muted">Hardware and Software Engineer</span>
        </div>
    </div><!-- End -->

          <!-- Team item -->
          <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/itqon.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Itqon Madani</h5><span class="small text-uppercase text-muted">Hardware Engineer</span>
            </div>
        </div><!-- End -->

              <!-- Team item -->
      <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/dap.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Daffa Adrian Ahmadi Tondang</h5><span class="small text-uppercase text-muted">Hardware Engineer</span>
        </div>
    </div><!-- End -->

          <!-- Team item -->
          <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/patur.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Muhammad Fathurrahman</h5><span class="small text-uppercase text-muted">Hardware Engineer</span>
            </div>
        </div><!-- End -->

              <!-- Team item -->
      <div class="col-xl-3 col-sm-6 mb-5" style="color: black">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="/fotopegawai/jis.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Luthfi Aziz Febrika Ardy</h5><span class="small text-uppercase text-muted">Hardware Engineer - Documentalist</span>
        </div>
    </div><!-- End -->
  </div>
</div>
@endsection

