@extends('layouts.visitorApp')
@section('content')

{{-- Hospital Sectoion --}}

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        @foreach ($hospital as $hospitalName)

        <h1 class="fw-bold" style="color: #2c4964;">{{$hospitalName->hospitalName}}</h1>
        @endforeach
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">

    <div class="container">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active fw-bold" data-bs-toggle="tab" href="#hospital">Hospital</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" data-bs-toggle="tab" href="#doctor">Doctor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" data-bs-toggle="tab" href="#gallery">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" data-bs-toggle="tab" href="#facility">Facility</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" data-bs-toggle="tab" href="#sociallink">Social Link</a>
        </li>

      </ul>

      <div class="tab-content  mt-2 ">
        <div class="tab-pane fade show active mt-5 " id="hospital">
          <div class="container-fluid ">
            @foreach ($hospital as $hospital)
            <div class="row">
              <div class="col-lg-6">
                <h5 class="fw-bold mt-5" style="color: #2c4964;">LET’S ENLIGHTEN THE LIVES…</h6><br>
                  <h2 class="fw-bold" style="color: #2c4964;">Welcome to {{$hospital->hospitalName }}</h3><br>
                    <p style="color: #2c4964;">At Kothiya Hospital we believe, life matters the most.
                      Escalating the costs, health care is proving prohibitive
                      for a large section of the society. Costs should never
                      become a cause for compromise in service, especially in a
                      crucial sector like health care.</p>
                    <p style="color: #2c4964;">Hospital is well-designed with internationally standardized wards.
                      It will be well-furnished and having a comfort zone for patients as
                      well as their relatives.</p>
                    <button class="btn text-white mt-4 mb-5" style="border-radius:25px;background-color:#1977CC;">Read More</button>
              </div>
              <div class="col-lg-6">
                <img src="{{url('/hospital')}}/{{$hospital->hospitalLogo}}" alt="" height="800px" width="800px" class="img-fluid">
              </div>

              <section id="contact" class="contact mt-5">
                <div class="container">
                  <div class="section-title">
                    <h2>Contact</h2>
                  </div>
                </div>

                <div class="container">
                  <div class="row mt-5">
                    <div class="col-lg-4">

                      @if (!Cookie::has('name'))
                      <div>
                        <a class="btn text-white mb-3" href="{{route('visitor.visitorsDetail')}}/{{$hospital->slug}}" style="background-color:#1977CC">Click to see below Details</a>
                      </div>
                      @else
                      <div></div>
                      @endif

                      <div class="info">
                        <div class="address">
                          <i class="bi bi-geo-alt"></i>
                          <h4>Location:</h4>
                          @if (Cookie::has('name'))
                          <p>{{$hospital->address}}</p>
                          @else
                          <p>********</p>
                          @endif
                        </div>

                        <div class="email">
                          <i class="bi bi-envelope"></i>
                          <h4>Email:</h4>
                          @if (Cookie::has('name'))
                          <p>{{$hospital->user->email}}</p>
                          @else
                          <p>********</p>
                          @endif

                        </div>

                        <div class="phone">
                          <i class="bi bi-phone"></i>
                          <h4>Call:</h4>
                          @if (Cookie::has('name'))
                          <p>{{$hospital->contactNo}}</p>
                          @else
                          <p>********</p>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                      @if(session()->has('message'))
                      <div class="alert alert-success">
                        {{ session()->get('message') }}
                      </div>
                      @endif
                      <form action="{{route('visitor.storeContact')}}" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" placeholder="Your Name">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                          </div>
                          <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" id="email" placeholder="Your Email">
                            @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                          </div>
                        </div>
                        <div class="form-group mt-3">
                          <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{old('subject')}}" id="subject" placeholder="Your subject">
                          @if($errors->has('subject'))
                          <span class="text-danger">{{$errors->first('subject')}}</span>
                          @endif
                        </div>
                        <div class="form-group mt-3">
                          <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Message">{{old('message')}}</textarea>
                          @if($errors->has('message'))
                          <span class="text-danger">{{$errors->first('message')}}</span>
                          @endif
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-primary mt-4">Send Message</button></div>
                      </form>

                    </div>

                  </div>

                </div>
              </section><!-- End Contact Section -->
            </div>
            @endforeach
          </div>

        </div>
        <div class="tab-pane fade mt-5" id="doctor">
          <div class="container-fluid">
            <div class="d-flex justify-content-start gap-4 flex-wrap ms-lg-3">
              @foreach ($doctor as $doctor)
              <div class="mt-5">
                <a href="{{route('visitor.doctorDetails')}}/{{$doctor->slug}}">

                  <div class="card h-100" style="width: 18rem;box-shadow: 0 5px 10px rgba(0,0,0,.2);">
                    <img src="{{url('/doctor')}}/{{$doctor->photo}}" class="img-fluid mt-5" alt="..." style="width: 150px;height:150px;
                                    border-radius: 50%;
                                    margin: 0 auto;
                                    box-shadow: 0 0 10px rgba(0,0,0,.2);">

                    <div class="card-body">
                      <h5 class="card-title text-center">{{$doctor->doctorName}}</h5>
                      <hr>

                      <h4 class="card-text text-center" style="color: #2c4964;">{{$doctor->specialist->specialistName}}</p>
                        {{---<p class="card-text text-center">{{$doctor->contactNo	}}</p> --}}
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="tab-pane fade mt-5" id="gallery">
          <div class="row">
            @foreach ($gallery as $gallery)
            <div class="col-lg-3 mt-5">
              <div class="w-75">
                <img src="{{url('/gallery')}}/{{$gallery->photo}}" widht="200px" height="200px">
                <h5 class="card-text text-center mt-3" style="color: #2c4964;">{{$gallery->title}}</h4>
              </div>
            </div>
            @endforeach

          </div>
        </div>
        <div class="tab-pane fade" id="facility">
          <div class="row">
            @foreach ($facility as $facility)
            <div class="col-lg-3 mt-5">
              <div class="w-75">
                <img src="{{url('/facility')}}/{{$facility->photo}}" widht="200px" height="200px">
                <h5 class="card-text text-center mt-3" style="color: #2c4964;">{{$facility->title}}</h4>
              </div>
            </div>
            @endforeach

          </div>
        </div>
        <div class="tab-pane fade" id="sociallink">
          <div class="row">
            @foreach ($sociallink as $sociallink)
            <div class="col-lg-4 mt-5 ms-5">

              <a href="{{$sociallink->link}}">{{$sociallink->title}}</a>
            </div>
            @endforeach
          </div>
        </div>

      </div>

    </div>
  </section>
  </div>


</main><!-- End #main -->

<script>
  $(document).ready(function() {
    $("#seelocation").click(function() {
      $("#location").toggle();
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("#seecontact").click(function() {
      $("#seecontactNo").toggle();
    });
  });
</script>


@endsection