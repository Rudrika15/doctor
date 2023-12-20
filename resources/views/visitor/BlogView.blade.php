@extends('layouts.visitorApp')
@section('content')
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
  <section id="blog">
    <div class="container">

      <div class="section-title">
        <h2>Blogs</h2>

        <!-- ======= Testimonials Section ======= -->
        <div class="row">
          <div class="col-md-8">
            <div id="testimonials" class="testimonials">

              <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">

                <div class="testimonial-wrap ">
                  <?php
                  $count = 0;
                  ?>
                  @foreach($blog as $person)
                  <?php
                  $count++
                  ?>

                  <div class="testimonial-item ">
                    <img src="{{asset('blog')}}/{{$person->photo}}" width="100px" class="rounded-circle" alt="image">
                    <h1 class="mt-3">{{$person->title}}</h1>
                    <h3 class="mt-3">{{$person->doctor->doctorName}}</h3>
                    <h4 class="mt-3">{{$person->doctor->specialist->specialistName}}</h4>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <p class="testimonial-content" id="testimonial-content-{{ $person->id }}">
                      {{ substr($person->detail, 0, 250) }}{{ strlen($person->detail) > 250 ? '...' : '' }}
                    </p>
                    <p class="full-content" style="display: none;">{{ $person->detail }}</p>

                    <a onclick="toggleReadMore({{$person->id}})" class="text-primary" id="read-more-btn-"><u>Read More</u></a>
                    <br>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>

                  </div>
                  @if($count==1)
                  @break
                  @endif
                  @endforeach
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-4 pt-3">
            @foreach($blog as $person)

            <!-- blog list -->

            <div class="container-list">
              <a class="w-100 px-2" href="{{route('visitor.blogViewSingle')}}/{{$person->id}}">
                <div class="item w-100">
                  <h5 class="fs-4 fw-bolder ">{{$person->title}}</h5>
                </div>
              </a>
            </div>
            <!-- blog list end -->
            @endforeach
          </div>
        </div>
      </div>

    </div>

  </section>
</main>
@endsection
<script>
  function toggleReadMore(personId) {
    var content = document.getElementById("testimonial-content-" + personId);
    var fullContent = document.querySelector("#testimonial-content-" + personId + " + .full-content");
    var button = document.getElementById("read-more-btn-" + personId);

    if (content.style.display !== "none") {
      content.style.display = "none";
      fullContent.style.display = "block";
      button.innerHTML = "Read Less";
    } else {
      content.style.display = "block";
      fullContent.style.display = "none";
      button.innerHTML = "Read More";
    }
  }
</script>