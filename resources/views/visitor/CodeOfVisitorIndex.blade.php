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
