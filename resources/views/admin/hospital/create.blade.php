@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Hospital Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('hospital.index') }}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('hospital.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hospital Name:</strong>
                <input type="text" name="hospitalName" id="hospitalName" class="form-control @error('hospitalName') is-invalid @enderror">
                @error('hospitalName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" cols="10" rows="5"></textarea>
                @error('address')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select City</strong>
                    <br>
                    <select class="form-select form-control-user @error('cityId') is-invalid @enderror"
                        name="cityId" id="cityId" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select City</option>
                             @foreach ($city as $city)
                                <option value={{$city->id}}>{{$city->name}}</option> 
                             @endforeach
                    </select>
                    @error('cityId')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact No</strong>
                <input type="text" name="contactNo" id="contactNo" class="form-control @error('contactNo') is-invalid @enderror">
                @error('contactNo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Hospital Type</strong>
                    <br>
                    <select class="form-select form-control-user @error('hospitalTypeId') is-invalid @enderror"
                        name="hospitalTypeId" id="hospitalTypeId" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select Hospital Type</option>
                             @foreach ($hospitaltype as $hospitaltype)
                                <option value={{$hospitaltype->id}}>{{$hospitaltype->typeName}}</option>
                             @endforeach
                    </select>
                    @error('hospitalTypeId')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select User</strong>
                    <br>
                    <select class="form-select form-control-user @error('userId') is-invalid @enderror"
                        name="userId" id="userId" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select User</option>
                             @foreach ($user as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                             @endforeach
                    </select>
                    @error('userId')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Site Url</strong>
                <input type="text" name="siteUrl" id="siteUrl" class="form-control @error('category') is-invalid @enderror">
                @error('siteUrl')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select Category</strong>
                    <br>
                    <select class="form-select form-control-user @error('category') is-invalid @enderror"
                        name="category" id="category" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select Category</option>
                             <option value="Alopethi">Alopethi</option>
                             <option value="Homiopethi">Homiopethi</option>
                             <option value="Aayurvedi">Aayurvedi</option>
                             
                    </select>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Select Hospital Logo</strong>
            <div class="row">
                <div class="col-md-4">
                    <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control @error('hospitalLogo') is-invalid @enderror" id="hospitalLogo" name="hospitalLogo">
                    @error('hospitalLogo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="hospitalLogo"></label>
                    <img src="{{url('hospital/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                </div>

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
            hospitalName:{
                required:true,
                minlength:5,
                maxlength:200
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
             hospitalTypeId:{
                required:true,
            },
            userId:{
                required:true,
            },
            siteUrl:{
                required:true,
            },
            category:{
                required:true,
            },
            hospitalLogo:{
                required:true,
            },	
        },
        messages:{
            hospitalName:{
                required:"Please Enter Hospital Name",
                minlength:"Enter Title Minimum of 5 Characters"
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
            hospitalTypeId:{
                required:"Please Select Hospital Type"
            },
            userId:{
                required:"Please Select User"
            },
            siteUrl:{
                required:"Please Select Site URL"
            },
            category:{
                required:"Please Select Category"
            },
            hospitalLogo:{
                required:"Please Select Hospital Logo"
            }
        },
        submitHandler:function(form){
            form.submit();
        }
    });
</script>
@endsection

