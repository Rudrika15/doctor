<!DOCTYPE html>
<html lang="en" >

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

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>

<style>
    body {
        font-size: 18px !important;
    }
</style>

<body style="background-color: #1977CC;">
    <div class="container text-center pt-5">
        <div class="d-flex justify-content-center mt-5">
            <div class="card w-50 mt-5 mb-5 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="">
                            {{-- <div class="frm-title">
                                <!-- <img src="{{asset('asset/img/logo.png')}}" alt="" style="height: 25%; width:25%;"> -->
                                <h4 class="text-center">Doctor</h4>
                            </div> --}}
                            <!-- /.title -->
                            <div class="frm-title text-center"><h3>Login</h3></div>
                            <div class="row mt-5">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="" style="width: 50%;">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 mt-5">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
        
                                <div class="" style="width: 50%;">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
        
                            <div class="d-flex justify-content-center">
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    <a  href="/" class="btn btn-dark">
                                        {{ __('Back') }}
                                    </a>
                                </div>
                                
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <div>
                                    @if (Route::has('password.request'))
                                <a class="text-muted" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                                &nbsp; &nbsp; &nbsp;
                                <a class="text-muted" href="{{route('register')}}">Create Account</a>
                           
                                </div>
                                
                            </div>
                                   
                    </form>
                </div>
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
