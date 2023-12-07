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

  <!-- ======= Services Section ======= -->
  <!-- ======= Appointment Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
    </div>

    <div>
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container">
      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+1 5589 55488 55s</p>
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


</main><!-- End #main -->


@endsection