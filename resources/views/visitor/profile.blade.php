@extends('layouts.visitorApp')
@section('content')
    <main id="main" class="mt-5">
        <section class="breadcrumbs">
                <div class="container">
                    
                    <div class="card mt-5 mb-5" width="300px;">
                        <section id="contact" class="contact">
                            <div class="info">
                                <div class="d-flex justify-content-between">
                                    <div class="w-50">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="{{url('profile')}}/{{$patient->photo}}" alt="" width="300px" height="300px">
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mt-3 ms-3">
                                                    <h1 class="fw-bold" style="color: #2c4964;">{{Auth::user()->name}}</h1>
                                                </div>
                                                <div class="address mt-4 ms-3">
                                                    <i class="bi bi-geo-alt"></i>
                                                    <h4>Address:</h4>
                                                    <p>{{$patient->address}}</p>
                                                </div>
                                                <div class="address mt-4 ms-3">
                                                    <i class="bi bi-geo-alt"></i>
                                                    <h4>State:</h4>
                                                    @foreach ($patient->state as $statename)
                                                        <p>{{$statename->stateName}}</p>
                                                    @endforeach
                                                </div>
                                                <div class="address mt-3 ms-3">
                                                    <i class="bi bi-person-circle"></i>
                                                    <h4>Gender:</h4>
                                                    <p>{{$patient->gender}}</p>
                                                </div>
                                            
                                                <div class="address mt-3 ms-3">
                                                    <i class="bi bi-boxes"></i>
                                                    <h4>Age:</h4>
                                                    <p>{{$patient->age}}</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 ms-3 mb-2">
                                                <div class="email mt-3">
                                                    <i class="bi bi-envelope-fill"></i>
                                                    <h4>Email:</h4>
                                                    <p>{{Auth::user()->email}}</p>
                                                </div>
                                                <div class="contact mt-3">
                                                    <i class="bi bi-telephone-outbound-fill"></i>
                                                    <h4>Contatc No:</h4>
                                                    <p>{{$patient->contactNo}}</p>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="w-50 ms-5">
                                            <div class="">
                                                <button class="btn btn-primary mt-5" id="showupdate">
                                                    Upadte Profile
                                                </button>
                                            </div>
                                            <div class="mt-3">
                                                <a href="{{route('visitor.index')}}" class="btn btn-primary">
                                                    Back
                                                </a>
                                            </div>
                                    </div>
                                </div>
                                
                               
                               
                            </div>
                        </section>
                    </div>
                    <div class="card" id="updateform" style="display: none;">
                        <div class="container mt-5 mb-5 ms-lg-5 ms-0">
                            <h1 class="text-center fw-bold mt-3 mb-3" style="color: #2c4964;">Update Profile</h1>
                        
                            <form class="mt-5" action="{{route('visitor.profile.patientUpdate')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{Auth::user()->id}}" name="userId">    
                                <div class="row">
                                    <div class="col-lg-4 mt-3">
                                        <label for="name" class="fw-bold" style="color: #2c4964;">{{_('Name')}}</label>
                                        <input type="text" class="form-control mt-1" value="{{Auth::user()->name}}" name="name" placeholder="Enter Name">
                                    </div>
                                    <div class="col-lg-4 mt-3" style="color: #2c4964;">
                                        <label for="email" class="fw-bold">{{_('Email')}}</label>
                                        <input type="text" class="form-control mt-1" name="email" value="{{Auth::user()->email}}" placeholder="Enter Email">
                                    </div>
                                    <div class="col-lg-4 mt-3">
                                        <label for="address" class="fw-bold" style="color: #2c4964;">{{_('Address')}}</label><br>
                                        <textarea name="address" id="address" cols="30" rows="3">{{$patient->address}}</textarea>
                                    </div>
                                    <div class="col-lg-4 mt-3" style="color: #2c4964;">
                                        <label for="contactNo" class="fw-bold">{{_('Contact Number')}}</label>
                                        <input type="text" class="form-control mt-2" name="contactNo" value="{{Auth::user()->contactNumber}}" placeholder="Enter Contact Number">
                                    </div>
                                    <div class="col-lg-4 mt-3" style="color: #2c4964;">
                                        <label for="gender" class="fw-bold" style="color: #2c4964;">{{_('Gender')}}</label>
                                        <div class="col-lg-3 mt-1">
                                            {{-- <input type="radio" id="s10" name="radio[1]" value="5"  { { old('radio.1')=="5" ? 'checked='.'"'.'checked'.'"' : '' } } /><label for="s10" title="5">5</label> --}}
                                            <label for="">{{_('Male')}}</label>
                                            <input type="radio" class="form-check-input" id="Male" name="gender" value="Male" {{old('gender',$patient->gender) == 'Male' ? 'checked':''}}>
                                        </div>
                                        <div class="col-lg-3 mt-1">
                                            <label for="">{{_('Female')}}</label>
                                            <input type="radio" class="form-check-input" id="Female" name="gender" value="Female" {{old('gender',$patient->gender) == 'Female' ? 'checked':''}}>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mt-3" style="color: #2c4964;">
                                        <label for="age" class="fw-bold">{{_('Age')}}</label>
                                        <input type="text" value="{{$patient->age}}" class="form-control mt-1" name="age" placeholder="Enter Age">
                                    </div>
                                    
                                    <div class="col-lg-4 mt-3" style="color: #2c4964;">
                                        <label for="stateId" class="fw-bold">{{_('State')}}</label>
                                        <select class="form-select" id="state-dropdown" name="stateId">
                                            <option disabled selected>Select state</option>
                                            {{-- @foreach ($city as $citydata)
                                            <option value="{{$citydata->id}}" {{$citydata->id == old('cityId',$hospital->cityId) ? 'selected':'' }}>{{$citydata->name}}</option> 
                                         @endforeach --}}
                                            @foreach ($state as $statedata)   
                                            <option value="{{$statedata->id}}" {{$statedata->id == old('stateId',$patient->stateId) ? 'selected':'' }}>{{$statedata->stateName}}</option>
                                            @endforeach
                                            
                                          </select>
                                    </div>
                                    
                                    <div class="col-lg-4 mt-3">
                                        <label for="photo" class="fw-bold">{{_('Photo')}}</label>
                                        <input type="file" accept='image/*' value="{{$patient->photo}}" onchange="readURL(this,'#img1')" value="{{$patient->photo}}"  class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                        @error('photo')
                                        <sapn class="text-danger">{{ $message }}</sapn>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 mt-3">
                                        <label for="image"></label>
                                        <img src="{{url('profile')}}/{{$patient->photo}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                                    </div>
                                    <div class="col-lg-12 mt-5 ">
                                        <center class="gx-5">
                                            <button class="btn btn-primary text-white mb-3">Update</button>
                                            <button class="btn btn-primary text-white mb-3">Cancel</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>

        </section>
    </main>
    <script>
        $(document).ready(function(){
          $("#showupdate").click(function(){
            $("#updateform").toggle();
          });
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
@endsection