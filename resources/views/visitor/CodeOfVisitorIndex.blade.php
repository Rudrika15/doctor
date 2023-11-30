<!DOCTYPE html>
<html lang="en" id="single-wrapper">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">

    <title>Doctor</title>
    <link rel="stylesheet" href="{{asset('asset/css/style.min.css')}}">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{asset('asset/css/waves.min.css')}}">
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/styles/color.css')}}">

</head>

<style>
    body {
        font-size: 18px !important;
    }
</style>

<body>
    <div id="single-wrapper">
        <div class="w-50">
               
                    <form method="POST" action="{{ route('register') }}" class="frm-single">
                        @csrf
                        <div class="inside">
                            <div class="frm-title">
                                <!-- <img src="{{asset('asset/img/logo.png')}}" alt="" style="height: 25%; width:25%;"> -->
                                <h4 class="">Doctor</h4>
                            </div>
                            <!-- /.title -->
                            <div class="frm-title">Register</div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="frm-input" style="width: 90%;">
                                    <input id="name" type="name" class="frm-inp @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="frm-input" style="width: 90%;">
                                    <input id="email" type="email" class="frm-inp @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="frm-input" style="width: 90%;">
                                    <input id="password" type="password" class="frm-inp @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                                
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Password Confirm') }}</label>
    
                                <div class="frm-input" style="width: 90%;">
                                    <input id="password-confirm" type="password" class="frm-inp @error('password-confirm') is-invalid @enderror" name="password-confirm" value="{{ old('password-confirm') }}" required autocomplete="password-confirm" autofocus>
                                
                                    @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="contactNumber" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>
    
                                <div class="frm-input" style="width: 90%;">
                                    <input id="contactNumber" type="contactNumber" class="frm-inp @error('contactNumber') is-invalid @enderror" name="contactNumber" value="{{ old('contactNumber') }}" required autocomplete="contactNumber" autofocus>
                                
                                    @error('contactNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn addbtn frm-submit">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                
            
        </div>
    </div>
</div>
   <!--/#single-wrapper -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
    <!-- 
	================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('asset/scripts/jquery.min.js')}}"></script>
    <script src="{{asset('asset/scripts/modernizr.min.js')}}"></script>
    <script src="{{asset('asset/scripts/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/scripts/nprogress.js')}}"></script>
    <script src="{{asset('asset/scripts/waves.min.js')}}"></script>

    <script src="{{asset('asset/scripts/main.min.js')}}"></script>
</body>

</html>


{{-- Patients Profile desing code old --}}
@extends('layouts.visitorApp')
@section('content')
    <main id="main" class="mt-5">
        <section class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1  class="mb-4"><span class="fw-bold" style="color: #2c4964;">Profile</span></h1>
                            <h4 style="color: #2c4964;">Name</h4>
                            <p>{{Auth::user()->name}}</p>
                            <h4 style="color: #2c4964;">Email</h4>
                            <p>{{Auth::user()->email}}</p>
                            <h4 style="color: #2c4964;">Contact No</h4>
                            <p>{{Auth::user()->contactNumber}}</p> 
                           {{-- <h5>{{$patient->userId}}</h5> --}}
                            {{-- <h5>{{$patient->patient->id}}</h5> --}}
                            
                        </div>
                        <div class="col-lg-6">
                            <h1 class="mb-4"><span class="fw-bold" style="color: #2c4964;">Update Profile</span></h1>
                            <form action="{{route('visitor.profile.patientUpdate')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="userId" value="{{Auth::user()->id}}" name="userId">    
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="name" class="fw-bold" style="color: #2c4964;">{{_('Name')}}</label>
                                        <input type="text" class="form-control mt-1" value="{{Auth::user()->name}}" name="name" placeholder="Enter Name">
                                    </div>
                                    <div class="col-lg-6" style="color: #2c4964;">
                                        <label for="email" class="fw-bold">{{_('Email')}}</label>
                                        <input type="text" class="form-control mt-1" name="email" value="{{Auth::user()->email}}" placeholder="Enter Email">
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="address" class="fw-bold" style="color: #2c4964;">{{_('Address')}}</label><br>
                                        <textarea name="address" id="address" cols="30" rows="3" style="border:none;s">{{$patient->address}}</textarea>
                                    </div>
                                    <div class="col-lg-6 mt-3" style="color: #2c4964;">
                                        <label for="contactNumber" class="fw-bold">{{_('Contact Number')}}</label>
                                        <input type="text" class="form-control mt-2" name="contactNumber" value="{{Auth::user()->contactNumber}}" placeholder="Enter Contact Number">
                                    </div>
                                    <div class="col-lg-6 mt-3" style="color: #2c4964;">
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
                                    <div class="col-lg-6 mt-3" style="color: #2c4964;">
                                        <label for="age" class="fw-bold">{{_('Age')}}</label>
                                        <input type="text" value="{{$patient->age}}" class="form-control mt-1" name="age" placeholder="Enter Age">
                                    </div>
                                    
                                    <div class="col-lg-6 mt-3" style="color: #2c4964;">
                                        <label for="stateId" class="fw-bold">{{_('State')}}</label>
                                        <select class="form-select" id="stateId" name="stateId">
                                            <option disabled selected>Select state</option>
                                            {{-- @foreach ($city as $citydata)
                                            <option value="{{$citydata->id}}" {{$citydata->id == old('cityId',$hospital->cityId) ? 'selected':'' }}>{{$citydata->name}}</option> 
                                         @endforeach --}}
                                            @foreach ($state as $statedata)   
                                            <option value="{{$statedata->id}}" {{$statedata->id == old('stateId',$patient->stateId) ? 'selected':'' }}>{{$statedata->stateName}}</option>
                                            @endforeach
                                            
                                          </select>
                                    </div>
                                    
                                    <div class="col-lg-6 mt-3">
                                        <label for="photo" class="fw-bold">{{_('Photo')}}</label>
                                        <input type="file" accept='image/*' value="{{$patient->photo}}" onchange="readURL(this,'#img1')" value="{{$patient->photo}}"  class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                        @error('photo')
                                        <sapn class="text-danger">{{ $message }}</sapn>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mt-3">
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
{{-- ---------------------------------------------------------------------------- --}}