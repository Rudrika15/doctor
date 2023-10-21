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
          <div class="d-flex justify-content-end">
            <form action="{{route('visitor.filterHospital')}}">
             <div class="d-flex">
              <select name="hospitalTypeId" id="hospitalTypeId" class="form-control text-center" style="border: 2px solid #1977CC;">
                <option selected>Hosital Type</option>
                @foreach ($hospitalType as $hospitalType)
                  <option value="{{$hospitalType->id}}">{{$hospitalType->typeName}}</option>
                @endforeach
              </select>
              <button type="submit" class="btn ms-3" style="background-color: #1977CC;color:white">Search</button>
              <a href="{{route('visitor.hospitalList')}}" class="btn ms-3 btn-dark">Back</a>

             </div>
            </form>
            
            
          </div>
        <div class="section-title">
          <h2>Hospitals</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        
        </div>
        
        <div class="row">
         
          @foreach ($filterHospital as $filterHospital)
 
          <div class="col-lg-6 mt-4 lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic">
                  <img src="{{url('/hospital')}}/{{$filterHospital->hospitalLogo}}" class="img-fluid rounded-circle" alt=""></div>
                <div class="member-info">
                  
                <h4>{{$filterHospital->hospitalName}}</h4>
                <span>Chief Medical Officer</span>
                  
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <a href="{{route('visitor.hospitalDetails')}}/{{$filterHospital->slug}}" class="btn text-white mt-2" style="background-color:#A1BDD6;">SeeDetails</a>

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
