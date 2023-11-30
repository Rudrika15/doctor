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
                  <div class="row member gap-3 mt-3 pt-5">
                    <div class="col-lg-2 member-info pt-3 shadow-lg p-3 mb-5 bg-body rounded" style="">
                      <h4>Experience</h4>
                      <span class="mt-3">{{$doctor->experience}}</span>
                      
                    </div>
                    <div class="col-lg-2 member-info pt-3 shadow-lg p-3 mb-5 bg-body rounded" style="">
                      <h4>Education</h4>
                      @foreach ($doctor->education as $education)
                          <span class="mt-3">{{$education->education}}</span>   
                      @endforeach
                    </div>
                    <div class="col-lg-3 member-info text-center pt-3 shadow-lg p-3 mb-5 bg-body rounded" style="">
                      <h4>Hospital</h4>
                      <a href="{{route('visitor.hospitalDetails')}}/{{$hospital->slug}}">
                        <div class="d-flex justify-content-start gap-5">
                          <img src="{{url('/hospital')}}/{{$hospital->hospitalLogo}}" alt="" class="card-img-left rounded-circle" width="60px" height="60px">
                          <span class="mt-3">{{$hospital->hospitalName}}</span>
                        </div>
                      </a> 
                    </div>
                    
                    <div class="col-lg-2 member-info pt-3 shadow-lg p-3 mb-5 bg-body rounded" style="">
                      <h4>Specialist</h4>
                      <span class="mt-3">{{$doctor->specialist->specialistName}}</span>
                    </div>
                     
                    <div class="col-lg-2 member-info pt-3 shadow-lg p-3 mb-5 bg-body rounded" style="">
                      <h4>Contact No</h4>
                      <span class="mt-3">{{$doctor->contactNo}}</span>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
         
          </div>
          {{-- @endforeach --}}
        </div>
    </section>
    
  </div>
    

  </main><!-- End #main -->

  
@endsection



