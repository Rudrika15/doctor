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
          <h2>Hospitals</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        
        <div class="row">
          @foreach ($hospital as $hospital)
          <div class="col-lg-6 mt-4 lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic">
                  <img src="{{url('/hospital')}}/{{$hospital->hospitalLogo}}" class="img-fluid rounded-circle" alt=""></div>
                <div class="member-info">
                  {{-- <div class="d-flex justify-content-end">
                    <button>See Details</button>
                  </div> --}}
                <h4>{{$hospital->hospitalName}}</h4>
                <span>Chief Medical Officer</span>
                  
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""><i class="ri-linkedin-box-fill"></i> </a>
                  <a href="{{route('visitor.hospitalDetails')}}/{{$hospital->id}}"><button class="btn text-white" style="background-color:#A1BDD6;margin-left: 70px">SeeDetails</button></a>
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



