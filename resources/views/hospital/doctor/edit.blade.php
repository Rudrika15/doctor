@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Doctor Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('doctor.index') }}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('doctor.update')}}" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$doctor->id}}" name="Id">
            <input type="hidden"  name="hospitalId" value="{{$doctor->hospitalId}}">
          
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Doctor Name </strong>
                    <input type="text" value="{{$doctor->doctorName}}" name="doctorName" id="doctorName" class="form-control @error('doctorName') is-invalid @enderror">
                    @error('doctorName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact No.  </strong>
                    <input type="number" value="{{$doctor->contactNo}}" name="contactNo" id="contactNo" class="form-control @error('contactNo') is-invalid @enderror">
                    @error('contactNo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Specialist Name </strong> 
                      <select type="text" value="{{$doctor->specialistId}}"  name="specialistId" id="specialistId" class="form-control @error('specialistId') is-invalid @enderror">
                      <option selected disabled><strong >Select here...  </strong></option>
                      @foreach ($specialist as $specialistdata)
                      <option value="{{$specialistdata->id}}" {{$specialistdata->id==old('specialistId',$doctor->specialistId)? 'selected':''}}>{{$specialistdata->specialistName}}</option>
             
                      @endforeach
                    </select>
                      @error('specialistId')
                      <sapn class="text-danger">{{ $message }}</sapn>
                      @enderror
                  </div>
              </div>

            
             
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Select Image </strong>
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" value="{{$doctor->photo}}"  accept='image/*' onchange="readURL(this,'#img1')" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
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
                    <strong> Experiance</strong>
                    <textarea value="{{$doctor->experience}}" class="form-control @error('experience')is-invalid @enderror" name="experience" id="experience" rows="3">{{$doctor->experience}}</textarea>
                    @error('experience')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Register No.  </strong>
                    <input type="number" value="{{$doctor->registerNumber}}" name="registerNumber" id="registerNumber" class="form-control @error('registerNumber') is-invalid @enderror">
                    @error('registerNumber')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btnsubmit">Update</button>
            </div>

        </form>
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
         
        
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
  
<script>
    jQuery('#frm').validate({
       rules:{
        
        doctorName:{
            required:true,
            minlength:5
        },
        contactNo:{
            required:true,
            minlength:10,
            maxlength:12,

        },
        specialistId:{
            required:true,
        },
        experience:{
                required:true,
                maxlength:25,

        },
        registerNumber:{
            required:true,
            minlength:12,
        },
          
           
       },
       messages:{
        doctorName:{
            required:"Please Enter Doctor Name",
        },
        contactNo:{
            required:"Please Enter Contact Number",  
        },
        specialistId:{
            required:"Please Select Specialist Name",
        },  
        experience:{
            required:"Please Enter Your Experiance",
        },
        registerNumber:{
            required:"Please Enter Register Number",
            minlength:"Please Enter Minimum of 12 Digit Or Charatcres"
          }
           
       },
       submitHandler:function(form){
           form.submit();
       }
   });
      </script>



@endsection