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
    
    <section id="doctors" class="doctors">
      <div class="container">
          <div class="d-flex justify-content-end">
            
            
            
          </div>
        <div class="section-title">
          <h2>Doctors</h2>    
        </div>
       
        <div class="d-flex justify-content-start gap-4 ms-lg-3">
                    @foreach ($doctor as $doctor)

                        <div class=" mt-5">
                          <a href="{{route('visitor.doctorDetails')}}/{{$doctor->slug}}">
                            <div class="card h-100"  style="width: 18rem;box-shadow: 0 5px 10px rgba(0,0,0,.2);">
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
                          </a>
                          
                        </div>
                    @endforeach
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
