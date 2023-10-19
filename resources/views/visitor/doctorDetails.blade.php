@extends('layouts.visitorApp')
@section('content')

{{-- Hospital Sectoion --}}

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
          <h2>Doctor</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        
        </div>
        
        <div class="row">
            {{-- <h1>Hello{{ request()->route('hospitalTypeId') }}</h1> --}}
           
            @foreach ($doctor as $doctor)
            
            <div class="col-lg-12 mt-4 lg-0">
              <div class="member d-flex align-items-start">
                
                <div class="pic">
                    <img src="{{url('/doctor')}}/{{$doctor->photo}}" class="img-fluid rounded-circle" alt=""></div>
                  <div class="member-info">
                    
                    <h1 class="text-center">{{$doctor->doctorName}}<hr></h1>
                    <h4>Education:-</h4>
                    <span>{{$doctor->experience}}</span>
                    <h4>Hospital:-</h4>
                    <a href="{{route('visitor.hospitalDetails')}}/{{$doctor->hospital->id}}" style="text-decoration:none;"><span>{{$doctor->hospital->hospitalName}}</span></a>

                    
                    <h4>Education:-</h4>
                    @foreach ($doctor->education as $education)
                        <span>{{$education->education}}</span>   
                    @endforeach
                    <h4>Specialist:-</h4>
                    <span>{{$doctor->specialist->specialistName}}</span>
 
                  {{-- <a href="{{route('visitor.hospitalDetails')}}/{{$hospital->id}}" class="btn text-white mt-2" style="background-color:#A1BDD6;">SeeDetails</a> --}}
  
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""><i class="ri-linkedin-box-fill"></i> </a>
                  </div>
                  
                </div>
              </div>
            </div>
            @endforeach
           
          </div>
      </div>
    </section>
    
  </div>
    

  </main><!-- End #main -->

  
@endsection



