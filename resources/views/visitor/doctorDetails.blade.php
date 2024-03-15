@extends('layouts.visitorApp')
@section('content')

{{-- Hospital Sectoion --}}
<style>
  .primary-color {
    color: #1977CC;
  }
</style>
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

  <section id="doctors" class="doctors">
    <div class="container">

      <div class="section-title">
        {{-- @foreach ($doctor as $doctor) --}}
        <h2>{{$doctor->doctorName}}</h2>
      </div>
      <div class="row">
        {{-- <h1>Hello{{ request()->route('hospitalTypeId') }}</h1> --}}
        <div class="col-lg-12">
          <div class="card" style="border:none;">
            <div class="card-body ">
              <div class="text-center">
                <img src="{{url('/doctor')}}/{{$doctor->photo}}" class="card-img-left rounded-circle" width="250px" height="250px" alt="">
              </div>
              <div class="row member gap-3 mt-3 pt-5 pe-5 ps-5">
                <div class="col member-info pt-3 shadow-lg p-3 mb-5 bg-body rounded">

                  <h4>Experience</h4>
                  <div class="d-flex justify-content-start gap-5">
                    <i class='fas fa-award fa-3x primary-color pt-4'></i>
                    <span class="pt-4">{{$doctor->experience}}</span>
                  </div>
                </div>
                <div class="col  member-info pt-3 shadow-lg p-3 mb-5 bg-body rounded">
                  <h4>Education</h4>
                  <div class="d-flex justify-content-between">
                    <div class="ps-4"><i class='fas fa-user-graduate fa-3x primary-color pt-4'></i></div>
                    <div class="pe-5">
                      @foreach ($doctor->education as $education)
                      <span class="pt-4">{{$education->education}}</span>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col member-info pt-3 shadow-lg p-3 mb-5 bg-body rounded">
                  <h4>Hospital</h4>
                  <a href="{{route('visitor.hospitalDetails')}}/{{$hospital->slug}}">
                    <div class="d-flex justify-content-start gap-5">
                      <i class='fas fa-hospital  fa-3x pt-4 primary-color '></i>
                      <span class="pt-4 text-dark">{{$hospital->hospitalName}}</span>
                    </div>
                  </a>
                </div>

                <div class="col member-info pt-3 shadow-lg p-3 mb-5 bg-body rounded">
                  <h4>Specialist</h4>
                  <div class="d-flex justify-content-start gap-5">
                    <i class='fas fa-user-md fa-3x pt-4 primary-color'></i>
                    <span class="pt-4">{{$doctor->specialist->specialistName}}</span>
                  </div>
                </div>
              </div>

              <div class="row mt-5 mb-5">

                <div class="col-md-3">


                  @if (!Cookie::has('name'))
                  <div>
                    <a class="btn text-white mb-3" href="{{route('visitor.visitorDetailForDoctorDetail')}}/{{$doctor->slug}}" style="background-color:#1977CC">Click to see Details</a>
                  </div>
                  @else
                  <div>
                    <h3 class="text-primary fs-2">Dr. Details</h3>
                  </div>
                  @endif
                </div>

                <div class="col-md-3 contact">
                  <div class="info">
                    <div class="email">
                      <i class="bi bi-envelope"></i>
                      <h4>Email:</h4>
                      @if (Cookie::has('name'))
                      <p>{{$doctor->user->email}}</p>
                      @else
                      <p>********</p>
                      @endif
                    </div>
                  </div>

                </div>
                <div class="col-md-3 contact">
                  <div class="info">
                    <div class="phone">
                      <i class="bi bi-phone"></i>
                      <h4>Dr. Contact No:</h4>
                      @if (Cookie::has('name'))
                      <p>{{$doctor->contactNo}}</p>
                      @else
                      <p>********</p>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-3 contact">
                  <div class="info">
                    <div class="phone">
                      <i class="bi bi-telephone"></i>
                      <h4>Hospital Contact No:</h4>
                      @if (Cookie::has('name'))
                      <p> {{$hospital->contactNo}}</p>
                      @else
                      <p>********</p>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
              <!-- For schedule -->
              <div>
                <h1 class="display-6  fw-medium text-primary mt-5">Schedule of Doctor </h1>
                <hr class="text-primary w-50">
                <table class="table table-striped table-hover table-bordered mt-3">
                  <thead>
                    <tr>
                      <th scope="col">Days</th>
                      <th scope="col">In Time</th>
                      <th scope="col">Out TIme</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($schedule as $schedules)
                    <tr>
                      @if($schedules->holiday == "Yes")
                      <td class=" bg-info-subtle text-danger fw-bolder">{{$schedules->day}}</td>
                      <td colspan="2" class="text-center  bg-info-subtle text-danger"><i class="me-5 fs-5 fw-bold ">Not Available</i></td>
                      @else
                      <td>{{$schedules->day}}</td>
                      <td>{{$schedules->beforeLunchInTime}}</td>
                      <td>{{$schedules->afterLunchOutTime}}</td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
      {{-- @endforeach --}}
    </div>
  </section>

  </div>


</main>
<!-- End #main -->


@endsection