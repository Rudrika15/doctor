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

      <form action="{{route('createMakeAnAppoinment')}}" method="POST" id="appointment_form">
        <div class="row">
          @csrf
          <div class="col-md-4 form-group">
            <input type="text" name="name" class="form-control p-3 @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" style="border-radius: 0px;">
            @if($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="email" class="form-control p-3 @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" style="border-radius: 0px;">
            @if($errors->has('email'))
            <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
          </div>
          <div class="col-md-4 form-group mt-3 mt-md-0">
            <input type="tel" class="form-control p-3 @error('contactNo') is-invalid @enderror" name="contactNo" value="{{old('contactNo')}}" id="contactNo" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" style="border-radius: 0px;">
            @if($errors->has('contactNo'))
            <span class="text-danger">{{$errors->first('contactNo')}}</span>
            @endif
          </div>  
        </div>
        <div class="row">
          <div class="col-md-4 form-group mt-3">
            <select name="categoryId" id="categoryId" class="form-select p-3 @error('categoryId') is-invalid @enderror" value="{{old('categoryId')}}" style="border-radius: 0px;">
              <option value="" disabled selected>Select Department</option>
              @foreach ($category as $category)
              <option value="{{$category->id}}">{{$category->categoryName}}</option>
              @endforeach
            </select>

            @if($errors->has('categoryId'))
            <span class="text-danger">{{$errors->first('categoryId')}}</span>
            @endif

          </div>
          <div class="col-md-4 form-group mt-3">
            <select name="stateId" id="stateId" class="form-select p-3 @error('stateId') is-invalid @enderror" value="{{old('stateId')}}" style="border-radius: 0px;">
              <option value="">Select State</option>
              @foreach ($states as $data)
              <option value="{{$data->id}}">{{$data->stateName}}</option>
              @endforeach
            </select>

            @if($errors->has('stateId'))
            <span class="text-danger">{{$errors->first('stateId')}}</span>
            @endif
          </div>
          <div class="col-md-4 form-group mt-3">
            <select name="cityId" id="cityId" class="form-select p-3 @error('stateId') is-invalid @enderror" value="{{old('stateId')}}" style="border-radius: 0px;">
              <option value="">-- Select City --</option>
            </select>

            @if($errors->has('cityId'))
            <span class="text-danger">{{$errors->first('cityId')}}</span>
            @endif

          </div>
          <div class="col-md-4 form-group mt-3">
            <select name="hospitalId" id="hospitalId" class="form-select p-3 @error('hospitalId') is-invalid @enderror" value="{{old('hospitalId')}}" style="border-radius: 0px;">
              <option value="">-- Select Hospital --</option>
            </select>

            @if($errors->has('hospitalId'))
            <span class="text-danger">{{$errors->first('hospitalId')}}</span>
            @endif

          </div>
          <div class="col-md-4 form-group mt-3">
            <select name="doctorId" id="doctorId" class="form-select p-3 @error('doctorId') is-invalid @enderror" value="{{old('doctorId')}}" style="border-radius: 0px;">
              <option value="">-- Select Doctor --</option>
            </select>

            @if($errors->has('doctorId'))
            <span class="text-danger">{{$errors->first('doctorId')}}</span>
            @endif
          </div>
          <div class="col-md-4 form-group mt-3">
            <select name="scheduleId" id="scheduleId" class="form-select p-3 @error('scheduleId') is-invalid @enderror" value="{{old('scheduleId')}}" style="border-radius: 0px;">
              <option value="">Select Schedule</option>
            </select>

            @if($errors->has('scheduleId'))
            <span class="text-danger">{{$errors->first('scheduleId')}}</span>
            @endif
          </div>
          <div class="col-md-12 form-group mt-3">
            <div class="row">
              <div class="col-md-2">
                <label for="Appoinment">Appoinment (date and time):</label>

              </div>
              <div class="col-md-10">
                <input type="datetime-local" name="appointmentDate" class="form-control p-3 datepicker @error('appointmentDate') is-invalid @enderror" value="{{old('appointmentDate')}}" id="appointmentDate" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars" style="border-radius: 0px;">
              </div>
            </div>
            @if($errors->has('appointmentDate'))
            <span class="text-danger">{{$errors->first('appointmentDate')}}</span>
            @endif
          </div>
        </div>

        <div class="form-group mt-3">
          <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Message (Optional)" value="{{old('message')}}" style="border-radius: 0px;"></textarea>
          @if($errors->has('message'))
          <span class="text-danger">{{$errors->first('message')}}</span>
          @endif
        </div>
        {{-- <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message" style="display:none;"></div>
              <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
            </div> --}}
        <div class="text-center">
          <button type="submit" value="submit" id="submit" class="appointment-btn scrollto mt-5" style="border:none;">Make an Appointment</button>
        </div>
      </form>

    </div>
  </section><!-- End Appointment Section -->

  </div>

</main><!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('#stateId').on('change', function() {
      var idState = this.value;
      $("#cityId").html('');
      $.ajax({
        url: "{{url('fetchCity')}}",
        type: "POST",
        data: {
          stateId: idState,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(res) {
          $('#cityId').html('<option value="">-- Select City --</option>');
          $.each(res.cities, function(key, value) {
            $("#cityId").append('<option value="' + value
              .id + '">' + value.name + '</option>');
          });
        },
        error: function(xhr, status, error) {
          console.log('AJAX request failed:', error);
        }
      });
    });

    $('#cityId').on('change', function() {
      var idCity = this.value;
      console.log(idCity);
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
          console.log('Success Response');
          $('#hospitalId').html('<option value="">-- Select Hospital --</option>');
          $.each(res.hospitals, function(key, value) {
            $("#hospitalId").append('<option value="' + value
              .id + '">' + value.hospitalName + '</option>');
          });
        },
        error: function(xhr, status, error) {
          console.log('AJAX request failed:', error);
        }
      });
    });

    $('#hospitalId').on('change', function() {
      var idHospital = this.value;
      console.log(idHospital);
      $("#doctorId").html('');
      $.ajax({
        url: "{{url('fetchDoctor')}}",
        type: "POST",
        data: {
          hospitalId: idHospital,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(res) {
          console.log('Success Response');
          $('#doctorId').html('<option value="">-- Select Doctor --</option>');
          $.each(res.doctors, function(key, value) {
            $("#doctorId").append('<option value="' + value
              .id + '">' + value.doctorName + '</option>');
          });
        },
        error: function(xhr, status, error) {
          console.log('AJAX request failed:', error);
        }
      });
    });

    $('#doctorId').on('change', function() {
      var idDoctor = this.value;
      console.log(idDoctor);
      $("#scheduleId").html('');
      $.ajax({
        url: "{{url('fetchSchedule')}}",
        type: "POST",
        data: {
          doctorId: idDoctor,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(res) {
          console.log('Success Response');
          $('#scheduleId').html('<option value="">-- Select Schedule --</option>');
          $.each(res.schedules, function(key, value) {
            $("#scheduleId").append('<option value="' + value.id + '">' + 'Date:-' + value.day + '</option>');
          });
        },
        error: function(xhr, status, error) {
          console.log('AJAX request failed:', error);
        }
      });
    });
  });
</script>
@endsection