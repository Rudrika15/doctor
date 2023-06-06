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

        <form action="{{route('doctor.update')}}" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$doctor->id}}" name="Id">

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                      <strong>Hospital Name </strong> 
                    <select type="text" value="{{$doctor->hospitalId}}" name="hospitalId" class="form-control @error('hospitalId') is-invalid @enderror">
                    <option selected disabled><strong >Select here...  </strong></option>
                    @foreach ($hospital as $hospitaldata)
                    <option value="{{$hospitaldata->id}}" {{$hospitaldata->id==old('hospitalId',$doctor->hospitalId)? 'selected':''}}>{{$hospitaldata->hospitalName}}</option>
           
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
                    <input type="text" value="{{$doctor->doctorName}}" name="doctorName" class="form-control @error('doctorName') is-invalid @enderror">
                    @error('doctorName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact No.  </strong>
                    <input type="number" value="{{$doctor->contactNo}}" name="contactNo" class="form-control @error('contactNo') is-invalid @enderror">
                    @error('contactNo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Specialist Name </strong> 
                      <select type="text" value="{{$doctor->specialistId}}"  name="specialistId" class="form-control @error('specialistId') is-invalid @enderror">
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
                <div class="form-group">
                        <strong>User Name </strong> 
                      <select type="text" value="{{$doctor->userId}}" name="userId" class="form-control @error('userId') is-invalid @enderror">
                      <option selected disabled><strong >Select here...  </strong></option>
                      @foreach ($user as $userdata)
                      <option value="{{$userdata->id}}" {{$userdata->id==old('userId',$doctor->userId)? 'selected':''}}>{{$userdata->name}}</option>

                      @endforeach
                    </select>
                      @error('userId')
                      <sapn class="text-danger">{{ $message }}</sapn>
                      @enderror
                  </div>
              </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Select Image </strong>
                <div class="row">
                    <div class="col-md-4">
                        <input type="file"  accept='image/*' onchange="readURL(this,'#img1')" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                        @error('photo')
                        <sapn class="text-danger">{{ $message }}</sapn>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="image"></label>
                        <img src="/photo/{{$doctor->photo}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                    </div>
                   
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Experiance</strong>
                    <textarea value="{{$doctor->experience}}" class="form-control @error('experience')is-invalid @enderror" name="experience" id="exampleTextarea" rows="3">{{$doctor->experience}}</textarea>
                    @error('experience')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Register No.  </strong>
                    <input type="number" value="{{$doctor->registerNumber}}" name="registerNumber" class="form-control @error('registerNumber') is-invalid @enderror">
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




@endsection