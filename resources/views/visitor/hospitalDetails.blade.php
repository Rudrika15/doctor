@extends('layouts.visitorApp')
@section('content')

{{-- Hospital Sectoion --}}

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container mt-5">

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
                          <button class="btn btn-primary text-white mt-4 mb-5" style="border-radius:25px;">Read More</button>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{url('/hospital')}}/{{$hospital->hospitalLogo}}" alt="" class="img-fluid" >
                    </div>

                    <section id="contact" class="contact mt-5">
                      <div class="container">
                        <div class="section-title">
                          <h2>Contact</h2>
                        </div>
                      </div>
                  
                      <div class="container">
                        <div class="row mt-5">
                          @if (Auth::user())
                              <div class="col-lg-4">
                                <div class="info">
                                  <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <button type="submit" id="seelocation" class="btn btn-primary ms-2">See Location</button>
                                    <p id="location" style="display:none;" class="mt-2">{{$hospital->address}}</p>
                                  </div>
                    
                                  <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>info@example.com</p>
                                  </div>
                    
                                  <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <button type="submit" id="seecontact" class="btn btn-primary ms-2">See Contact No</button>
                                    <p id="seecontactNo" style="display:none;" class="mt-2">{{$hospital->contactNo}}</p>
                                  </div>
                                </div>
                              </div>   
                            @else
                              <div class="col-lg-4">
                                <a class="btn btn-primary mb-3" href="{{route('login')}}">Login to see Details</a>
                                <div class="info">
                                  <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>********</p>
                                  </div>
                    
                                  <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>*********</p>
                                  </div>
                    
                                  <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>***********</p>
                                  </div>
                                </div>
                              </div>  
                          @endif
                          
                
                          <div class="col-lg-8 mt-5 mt-lg-0">
                
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
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
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                              </div>
                              <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                              </div>
                              <div class="text-center"><button type="submit">Send Message</button></div>
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
                <div class="row">
                  @foreach ($doctor as $doctor)
                      <div class="col-lg-4 mt-5">
                        <div class="card" style="width: 18rem;box-shadow: 0 5px 10px rgba(0,0,0,.2);">
                          <img src="{{url('/doctor')}}/{{$doctor->photo}}" class="img-fluid mt-5" alt="..." 
                                style="width: 150px;height:150px;
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
                      <img src="{{url('/gallery')}}/{{$gallery->photo}}" alt=" " class="img-fluid" widht="200px" height="200px">
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
                    <img src="{{url('/facility')}}/{{$facility->photo}}" alt=" " class="img-fluid" widht="200px" height="200px">
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
    $(document).ready(function(){
      $("#seelocation").click(function(){
        $("#location").toggle();
      });
    });
    </script>
    <script>
      $(document).ready(function(){
        $("#seecontact").click(function(){
          $("#seecontactNo").toggle();
        });
      });
      </script>
    
@endsection



