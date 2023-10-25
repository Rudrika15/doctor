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
    <section id="appointment" class="appointment section-bg">
        <div class="container">
  
          <div class="section-title">
            <h2>Make an Appointment</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>
  
          <form action="" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-4 form-group">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
                @error('name')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                <div class="validate"></div>
                @error('email')
                  <span class="tex-danger">{{$messgae}}</span>
                @enderror
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <input type="tel" class="form-control" name="contactNo" id="contactNo" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
                @error('contactNo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 form-group mt-3">
                <select name="categoryId" id="categoryId" class="form-select @error('categoryId') is-invalid @enderror">
                  <option value="">Select Department</option>
                  @foreach ($category as $category)
                      <option value="{{$category->id}}">{{$category->categoryName}}</option>
                  @endforeach
                  @error('categoryId')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </select>
                <div class="validate"></div>
              </div>
              <div class="col-md-4 form-group mt-3">
                <select name="cityId" id="cityId" class="form-control @error('cityId') is-invalid @enderror">
                  <option value="">Select City</option>
                  @foreach ($cities as $data)
                      <option value="{{$data->id}}">{{$data->name}}</option>
                  @endforeach
                  @error('cityId')
                      <span class="text-center">{{$message}}</span>
                  @enderror
                </select>
                <div class="validate"></div>
              </div>
              
              <div class="col-md-4 form-group mt-3">
                <select name="hospitalId" id="hospitalId" class="form-control @error('hospitalId') is-invalid @enderror">                 
                  @error('hospitalId')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </select>
                <div class="validate"></div>
              </div>
              <div class="col-md-4 form-group mt-3">
                <select name="doctorId" id="doctorId" class="form-select @error('doctorId') is-invalid @enderror">
                  <option value="">Select Doctor</option>
                  @foreach ($doctor as $doctor)
                      <option value="{{$doctor->id}}">{{$doctor->doctorName}}</option>
                  @endforeach

                  @error('doctorId')
                      <span class="text-center">{{$message}}</span>
                  @enderror
                </select>
                <div class="validate"></div>
              </div>
              <div class="col-md-4 form-group mt-3">
                <select name="scheduleId" id="scheduleId" class="form-select @error('scheduleId') is-invalid @enderror">
                  <option value="">Select Schedule</option>
                  @foreach ($schedule as $schedule)
                      <option value="{{$schedule->id}}">{{$schedule->time}},{{$schedule->day}}</option>
                  @endforeach
                  @error('scheduleId')
                      <span class="text-center">{{$message}}</span>
                  @enderror
                </select>
                <div class="validate"></div>
              </div>
              <div class="col-md-4 form-group mt-3">
                <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
            </div>
  
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
            </div>
            <div class="text-center">
              <button type="submit">Make an Appointment</button></div>
          </form>
  
        </div>
      </section><!-- End Appointment Section -->
  
  </div>
      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('#cityId').on('change', function() {
            var idCity = this.value;
        console.log('Selected City ID:', idCity);
            $("#hospitalId").html('');
            $.ajax({
                url: "{{url('fetchHospital')}}",
                type: "POST",
                data: {
                  cityId: idCity,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#hospitalId').html('<option value="">-- Select City --</option>');
                    $.each(res.hospitals, function(key, value) {
                        $("#hospitalId").append('<option value="' + value
                            .id + '">' + value.cityName + '</option>');
                    });
                }
            });

        });
    });
</script>

  </main><!-- End #main -->

 
@endsection



