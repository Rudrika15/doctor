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
                                    <input id="password-confirm" type="password" class="frm-inp @error('password-confirm') is-invalid @enderror" name="password_confirmation" value="{{ old('password-confirm') }}" required autocomplete="password-confirm" autofocus>
                                
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
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
    
                                <div class="frm-input" style="width: 90%;">
                                    <input id="address" type="address" class="frm-inp @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                                
                                    <div class="frm-input" style="width: 90%;">
                                        <div class="col">
                                            <input type="radio" id="Male" name="gender" value="Male">
                                            <label for="html">Male</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="Female" name="gender" value="Female">
                                            <label for="css">Female</label>
                                         
                                        </div>
                                       
                                    
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                                <div class="frm-input" style="width: 90%;">
                                    <input id="age" type="age" class="frm-inp @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>
                                
                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Select State') }}</label>
    
                                <div class="frm-input" style="width: 90%;">
                                    <select class="frm-inp" name="stateId" aria-label="Default select example">
                                        <option selected>Open this select state</option>
                                        <option value=1>One</option>
                                        
                                      </select>
                                   
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                    @error('photo')
                                    <sapn class="text-danger">{{ $message }}</sapn>
                                    @enderror
                                </div>
                
                                <div class="col-md-4">
                                    <label for="image"></label>
                                    <img src="{{url('gallery/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
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
    {{-- <link rel="stylesheet" href="{{asset('asset/css/style.min.css')}}"> --}}

    <!-- Waves Effect -->
    {{-- <link rel="stylesheet" href="{{asset('asset/css/waves.min.css')}}"> --}}
    <!-- bootstrap 5 css -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> --}}

    <!-- style css -->
    {{-- <link rel="stylesheet" href="{{asset('assets/styles/color.css')}}"> --}}

    {{-- Bootstrap Links --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body style="background: #f1f1f1 ">

    <div class="container mt-3 mb-5">
        <h1 class="text-center" style="color: #2c4964;">Doctor</h1>
        <hr>
        <h3 class="text-center mt-3" style="color: #2c4964;">Registration</h3>
        <form class="mt-3 mb-5" method="POST" action="{{ route('register') }}">
          <div class="row" style="">
            <div class="col-lg-6 mt-3">
                <label for="name">{{_('Name')}}</label>
                <input type="text" class="form-control mt-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-lg-6 mt-3">
                <label for="email">{{_('Email Address')}}</label>
                <input type="email" class="form-control mt-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-lg-6 mt-3">
                <label for="address">{{_('Address')}}</label>
                <textarea class="form-control @error('address') is-invalid @enderror" rows="5" id="comment" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus></textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-lg-6 mt-3">
                <label for="contactNumber">{{_('Contact No')}}</label>
                <input type="text" class="form-control mt-2 @error('contactNumber') is-invalid @enderror" name="contactNumber" value="{{ old('contactNumber') }}" required autocomplete="contactNumber" autofocus>
                @error('contactNumber')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="mt-3 ms-5">
                    <label for="contactNumber">{{_('Gender')}}</label>
                    <div class="mt-3">
                        <input type="radio" class="form-check-input border border-primary" id="Male" name="gender" value="Male">
                        <label class="form-check-label" for="radio1">Male</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input border border-primary" id="Femal" name="gender" value="Female">
                        <label class="form-check-label" for="radio2">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <label for="stateId">{{_('State')}}</label>
                <select class="form-select" id="stateId" name="stateId">
                    <option disabled selected>---Select State---</option>
                    @foreach ($states as $state)    
                        <option value="{{$state->id}}">{{$state->stateName}}</option>
                    @endforeach
                    
                     
                  </select>
                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-lg-6 mt-3">
                <label for="age">{{_('Age')}}</label>
                    <input type="text" class="form-control mt-2 @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>
                    @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
            <div class="col-lg-6 mt-3">
                <label for="name">{{_('Name')}}</label>
                <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                    @error('photo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
            </div>    
            <div class="col-lg-6 mt-3">
                <div class="col-md-4 mt-4">
                    <label for="image"></label>
                    <img src="{{url('gallery/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <label for="password">{{_('Password')}}</label>
                <input type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-lg-6 mt-3">
                <label for="password-confirm">{{_('Password Confirm')}}</label>
                <input type="password" class="form-control mt-2 @error('password-confirm') is-invalid @enderror" name="password-confirm" value="{{ old('password-confirm') }}" required autocomplete="password-confirm" autofocus>
                @error('password-confirm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mt-4 px-5 mb-5">
                <center>
                    <button type="submit" class="btn btn-primary mx-2">Submit</button>
                    <button type="submit" class="btn btn-primary mx-2">Cancel</button>
                </center>
            </div>
          </div>
        </form>
      </div>
    {{-- <script src="{{asset('asset/scripts/jquery.min.js')}}"></script>
    <script src="{{asset('asset/scripts/modernizr.min.js')}}"></script>
    <script src="{{asset('asset/scripts/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/scripts/nprogress.js')}}"></script>
    <script src="{{asset('asset/scripts/waves.min.js')}}"></script>

    <script src="{{asset('asset/scripts/main.min.js')}}"></script> --}}

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
</body>
</html>