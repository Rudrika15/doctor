@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Doctor Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('schedule.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('schedule.store')}}"  method="POST">
            @csrf
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                      <strong>Hospital Name </strong> 
                    <select type="text" name="hospitalId" id="hospitalId" class="form-control @error('hospitalId') is-invalid @enderror">
                    <option selected disabled><strong >Select here...  </strong></option>
                   @foreach ($hospital as $hospital)
                   <option value="{{$hospital->id}}">{{$hospital->hospitalName}}</option>

                   @endforeach
                    </select>
                    @error('hospitalId')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Doctor Name </strong> 
                      <select type="text" name="doctorId" id="doctorId" class="form-control @error('doctorId') is-invalid @enderror">
                      <option selected disabled><strong >Select here...  </strong></option>
                     @foreach ($doctor as $doctor)
                     <option value="{{$doctor->id}}">{{$doctor->doctorName}}</option>

                     @endforeach
                      </select>
                      @error('doctorId')
                      <sapn class="text-danger">{{ $message }}</sapn>
                      @enderror
                  </div>
              </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Day </strong>
                    <input type="date" name="day"  id="day" class="form-control @error('day') is-invalid @enderror">
                    @error('day')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Session</strong>
                    <input type="text" name="session"  id="session" class="form-control @error('session') is-invalid @enderror">
                    @error('session')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Time</strong>
                    <input type="number" name="time" id="time" class="form-control @error('time') is-invalid @enderror">
                    @error('time')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btnsubmit">Submit</button>
            </div>

        </form>        
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
  
    <script>
        jQuery('#frm').validate({
        rules:{
                hospitalId:"required",
                doctorId:"required",
                day:"required",
                photo:"required",
                session:"required",
                time:"required",
        },messages:{
                    hospitalId:"Please Select Hospital",
                    doctorId:"Please Select Doctor",
                    day:"Please Enter day",
                    photo:"Please Select Image",
                    session:"Please Enter Session",
                    time:"Please Enter Time",
            },
        submitHandler:function(form)
        {
             form.submit();
        }
        });
     </script>


@endsection