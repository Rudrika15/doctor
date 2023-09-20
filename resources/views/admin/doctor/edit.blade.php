@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Doctor Management</h2>
        {{-- <div class="pt-2"><a class="btn addbtn" href="{{ route('admin.doctor.index') }}"> Back</a></div> --}}
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('admin.doctor.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="doctorId"  value="{{$doctor->id}}">
        <input type="hidden" name="hospitalId" value="{{$doctor->hospitalId}}">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Doctor Name:</strong>
                <input type="text" name="doctorName" id="doctorName" value="{{$doctor->doctorName}}" class="form-control @error('doctorName') is-invalid @enderror">
                @error('doctorName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact No</strong>
                <input type="text" name="contactNo" id="contactNo" value={{$doctor->contactNo}} class="form-control @error('contactNo') is-invalid @enderror">
                @error('contactNo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select Specialist</strong>
                    <br>
                    <select class="form-select form-control-user @error('specialistId') is-invalid @enderror"
                        name="specialistId"  id="specialistId" value="{{$doctor->specialistId}}" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                         <option selected disabled>Select Specialist</option>
                          @foreach ($specialist as $specialistdata)
                                <option value="{{$specialistdata->id}}" {{$specialistdata->id == old('specialistId',$doctor->specialistId)? 'selected':''}}>{{$specialistdata->specialistName}}</option>
                             @endforeach
                    </select>
                    @error('specialistId')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>
        {{-- Auth User --}}
        <input type="hidden" name="userId" value="{{Auth::User()->id}}">
        {{--  --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Select Image </strong>
            <div class="row">
                <div class="col-md-4">
                    <input type="file" value="{{$doctor->photo}}" accept='image/*' onchange="readURL(this,'#img1')" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                    @error('photo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="image"></label>
                    <img src="{{asset('doctor')}}/{{$doctor->photo}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                </div>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Experience:</strong>
                <textarea name="experience" id="experience" value="{{$doctor->experience}}" id="editor1" class="form-control @error('experience') is-invalid @enderror" cols="10" rows="5">{{$doctor->experience}}</textarea>
                @error('experience')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Register No</strong>
                <input type="text" name="registerNumber" id="registerNumber" value="{{$doctor->registerNumber}}" class="form-control @error('registerNumber') is-invalid @enderror">
                @error('registerNumber')
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

<script>
    function readURL(input, tgt) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector(tgt).setAttribute("src",
                    e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

{{-- Jquery Validation --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>

<script>

    jQuery('#frm').validate({
        rules:{
            doctorName:{
                required:true,
                minlength:5,
                maxlength:200
            },
            contactNo:{
                required:true,
                minlength:10,
                maxlength:12,
            },
            specialistId:{
                required:true, 
            },
            userId:{
                required:true, 
            },
           
            experience:{
                required:true,
            },
            registerNumber:{
                required:true,
            }
        },
        messages:{
            doctorName:{
                required:"Please Enter Hospital Type Name",
                minlength:"Doctor Name Minimum of 5 Character Long"
            },
            contactNo:{
                        required:"Please Enter Contact Number",
                        minlength:"Enter Contact Number Minimum of 10 Charactrs",
                        maxlength:"Can't Enter Contact Number  More Then of 12 Didgit"
            },
            specialistId:{
                required:"Please Select Specialist"
            },
            userId:{
                required:"Please Select User"
            },
            
            experience:{
                required:"Please Enter Experience"
            },
            registerNumber:{
                required:"Please Enter Registation Number"
            }
        },
        submitHandler:function(form){
            form.submit();
        }
    });
</script>
@endsection