<!DOCTYPE html>
<html lang="en" id="single-wrapper">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hospital</title>
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>
        .error-message {
            color: red;
        }
    </style>    
</head>

<body style="background-color: #1977CC;">
    <div class="container">
        <div class="d-flex justify-content-center mt-3 mb-3">
            <div class="card mt-5 w-75" >
                <div class="card-body mt-3 mb-3 ms-3 me-3" style="border: 2px solid #1977CC;">
                    <h3 class="card-title text-center">Hospital Register</h3>
                   
                        <form id="frm" action="{{route('registerhospitalStore')}}" method="POST"  class="mt-2 mb-2" enctype="multipart/form-data">
                           @csrf
                            <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="hospitalName">{{_('Hospital Name')}}<span class="text-danger">*</span></label>
                                <input type="text" name="hospitalName" id="hospitalName" class="form-control mt-2 @error('hospitalName') is-invalid @enderror" >
                                @error('hospitalName')
                                    <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mt-3">
                                <label for="email">{{_('Email')}}<span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control mt-2 @error('email') is-invalid @enderror">
                                @error('email')
                                    <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="password">{{_('Password')}}<span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control mt-2 @error('password') is-invalid @enderror">
                                @error('password')
                                    <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                            
                           
                            <div class="col-md-12 mt-3">
                                <label for="address">{{_('Address')}}<span class="text-danger">*</span></label>

                                <textarea name="address" id="address" name="address" class="form-control mt-2 @error('address') is-invalid @enderror" cols="10" rows="3"></textarea>
                                @error('address')
                                    <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="cityId">{{_('City')}}<span class="text-danger">*</span></label>

                                <select name="cityId" id="cityId" class="form-control mt-2 @error('cityId') is-invalid @enderror">
                                    <option selected disabled>Select City</option>
                                        @foreach ($city as $city)
                                            <option value={{$city->id}}>{{$city->name}}</option> 
                                        @endforeach
                                </select>
                                @error('cityId')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="hospitalTypeId">{{_('Hospital Type')}}<span class="text-danger">*</span></label>

                                <select class="form-control mt-2 @error('hospitalTypeId') is-invalid @enderror" name="hospitalTypeId" id="hospitalTypeId">
                                    <option selected>--Select Hospital Type--</option>
                                    @foreach ($hospitaltype as $hospitaltype)
                                        <option value={{$hospitaltype->id}}>{{$hospitaltype->typeName}}</option>
                                    @endforeach
                                </select>
                                @error('hospitalTypeId')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="siteUrl">{{_('Site Url')}}<span class="text-danger">*</span></label>

                                <input type="text" class="form-control @error('siteUrl') is-invalid @enderror" name="siteUrl" id="siteUrl">
                                @error('siteUrl')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="category">{{_('Category')}}<span class="text-danger">*</span></label>

                                <select name="category" id="category" class="form-control mt-2 @error('category') is-invalid @enderror">
                                    <option selected>--Select Category--</option>
                                    <option value="Alopethi">Alopethi</option>
                                    <option value="Homiopethi">Homiopethi</option>
                                    <option value="Aayurvedi">Aayurvedi</option>
                                </select>
                                @error('category')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="hospitalTime">{{_('Hospital Time')}}<span class="text-danger">*</span></label>

                                <input type="time" class="form-control mt-2 @error('hospitalTime') is-invalid @enderror" name="hospitalTime" id="hospitalTime">
                                @error('hospitalTime')
                                  <span class="text-danger">{{$message}}</span>  
                                @enderror
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="services">{{_('Services')}}<span class="text-danger">*</span></label>

                                <input type="text" class="form-control mt-2 @error('services') is-invalid @enderror" name="services" id="services" >
                                @error('services')
                                  <span class="text-danger">{{$message}}</span>  
                                @enderror
                            </div>
                            <div class="col-md-4 mt-5">
                                <label for="contactNo">{{_('Contact No')}}<span class="text-danger">*</span></label>

                                <input type="text" class="form-control  mt-2 @error('contactNo') is-invalid @enderror" id="contactNo" name="contactNo">
                                @error('contactNo')
                                  <span class="text-danger">{{$message}}</span>  
                                @enderror
                            </div>
                            <div class="col-md-6 mt-5">
                                <label for="hospitalLogo">{{_('Hospital Logo')}}<span class="text-danger">*</span></label>

                                <input type="file" accept='image/*'onchange="readURL(this,'#img1')" class="form-control mt-2 @error('hospitalLogo') is-invalid @enderror" id="hospitalLogo" name="hospitalLogo">
                                @error('hospitalLogo')
                                  <span class="text-danger">{{$message}}</span>  
                                @enderror
                            </div>
                            <div class="col-md-2 mt-3">
                                <img src="{{asset('hospital/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                            </div>
                            <div class="col-md-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </div>
                        </form>
                        
                    
                </div>
            </div>
        </div>
        
    </div>
    
       {{-- Jquery Validation --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>

<script>

    jQuery('#frm').validate({
        rules:{
            hospitalName:{
                required:true,
                minlength:5,
                maxlength:200
            },
            email:{
                required:true,
            },
            password:{
                required:true,
                minlength:6,
            },
            address:{
                required:true,
                minlength:10,
            },
            cityId:{
                required:true,
            },
            contactNo:{
                required:true,
                minlength:10,
                maxlength:12,
            },
            //  hospitalTypeId:{
            //     required:true,
            // },
            
            siteUrl:{
                required:true,
            },
            // category:{
            //     required:true,
            // },
            hospitalLogo:{
                required:true,
            },
            hospitalTime:{
                required:true,
            },
            services:{
                required:true,
            }	
        },
        messages:{
            hospitalName:{
                required:"Please Enter Hospital Name",
                minlength:"Enter Title Minimum of 5 Characters"
            },
            email:{
                required:"Please Enter Email",
            },
            password:{
                required:"Please Enter Password",
                minlength:"Enter Title Minimum of 6 Characters"
            },
            address:{
                required:"Please Enter Address",
                minlength:" Enter Address Minimum of 10 Charecters"
            },
            cityId:{
                required:"Please Select City"
            },
            contactNo:{
                        required:"Please Enter Contact Number",
                        minlength:"Enter Contact Number Minimum of 10 Charactrs",
                        maxlength:"Can't Enter Contact Number  More Then of 12 Didgit"
            },
            // hospitalTypeId:{
            //     required:"Please Select Hospital Type"
            // },
            siteUrl:{
                required:"Please Select Site URL"
            },
            // category:{
            //     required:"Please Select Category"
            // },
            hospitalLogo:{
                required:"Please Select Hospital Logo"
            },
            hospitalTime:{
                required:"Please Enter Hospital Time"
            },
            services:{
                required:"Pleace Enter services"
            }
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
