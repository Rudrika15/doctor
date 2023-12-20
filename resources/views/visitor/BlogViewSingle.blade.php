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
    <input type="hidden" value="{{$blog->id}}" name="blogSingleId">
    <section id="blog">
        <div class="container">
            <a href="{{route('visitor.blogView')}}" class="text-decoration-none btn btn-dark  text-white">Back</a>

            <div class="section-title">

                <section id="testimonials" class="testimonials">

                    <!-- ======= Testimonials Section ======= -->
                    <h2 class="ms-5">{{$blog->doctor->doctorName}}</h2>
                    <h4 class="ms-5">{{$blog->doctor->specialist->specialistName}}</h4>
                    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">

                            <div class="swiper-slid">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">

                                        <img src="{{asset('blog')}}/{{$blog->photo}}" width="100px" class="rounded-circle" alt="image">
                                        <h1 class="mt-2">{{$blog->title}}</h1>

                                        <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <p class="testimonial-content" id="testimonial-content-{{ $blog->id }}">
                      {{ substr($blog->detail, 0, 250) }}{{ strlen($blog->detail) > 250 ? '...' : '' }}
                    </p>
                    <p class="full-content" style="display: none;">{{ $blog->detail }}</p>

                    <a onclick="toggleReadMore({{$blog->id}})" class="text-primary" id="read-more-btn-"><u>Read More</u></a>
                    <br>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
        </div>
    </section>
</main>
@endsection
<script>
    function toggleReadMore(blogId) {
        var content = document.getElementById("testimonial-content-" + blogId);
        var fullContent = document.querySelector("#testimonial-content-" + blogId + " + .full-content");
        var button = document.getElementById("read-more-btn-" + blogId);

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