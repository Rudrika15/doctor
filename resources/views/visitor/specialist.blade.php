@extends('layouts.visitorApp')
@section('content')

{{-- Hospital Sectoion --}}
@php
    $cityId = session('cityId');
@endphp
<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container mt-3">
      <div class="tab-content  mt-2 ">
        <div class="tab-pane fade show active mt-3">

        </div>
      </div>
    </div>
  </section><!-- End Breadcrumbs Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Specialist</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
      <div class="row">

        @foreach ($specialist as $specialist)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 md-0">
          <a href="{{route('visitor.doctorList')}}/{{$specialist->slug}}">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="">{{$specialist->specialistName}}</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </a>
        </div>
       
        @endforeach
      </div>

    </div>
  </section><!-- End Services Section -->

  </div>


</main><!-- End #main -->


@endsection