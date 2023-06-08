@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Doctor Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('doctor.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('doctor.store')}}" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="doctorName" id="doctorName" class="form-control @error('doctorName') is-invalid @enderror">
                    @error('doctorName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact No.  </strong>
                    <input type="number" id="contactNo" name="contactNo" class="form-control @error('contactNo') is-invalid @enderror">
                    @error('contactNo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Specialist Name </strong> 
                      <select type="text" name="specialistId" id="specialistId" class="form-control @error('specialistId') is-invalid @enderror">
                      <option selected disabled><strong >Select here...  </strong></option>
                      @foreach ($specialist as $specialist)
                     <option value="{{$specialist->id}}">{{$specialist->specialistName}}</option>
                     @endforeach
                    </select>
                      @error('specialistId')
                      <sapn class="text-danger">{{ $message }}</sapn>
                      @enderror
                  </div>
              </div>

              <input type="hidden" name="userId" value="{{Auth::User()->id}}">
             

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Select Image </strong>
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                        @error('photo')
                        <sapn class="text-danger">{{ $message }}</sapn>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="image"></label>
                        <img src="{{url('doctor/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                       
                    </div>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Experiance</strong>
                    <textarea class="form-control @error('experience')is-invalid @enderror" name="experience" id="experience" rows="3"></textarea>
                    @error('experience')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Register No.  </strong>
                    <input type="number" name="registerNumber" id="registerNumber" class="form-control @error('registerNumber') is-invalid @enderror">
                    @error('registerNumber')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btnsubmit">Submit</button>
            </div>

        </form>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
          
          <script>
       jQuery('#frm').validate({
       rules:{
        hospitalId:"required",
          
           
       },messages:{
        hospitalId:"Please Enter Hospital Name"
          
           
       },
       submitHandler:function(form){
           form.submit();
       }
   });
         </script>




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




@endsection