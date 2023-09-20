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

        <form id="frm" action="{{route('hospital.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="hospitalId" value="{{$hospital->id}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hospital Name:</strong>
                <input type="text" value="{{$hospital->hospitalName}}" name="hospitalName" id="hospitalName" class="form-control @error('hospitalName') is-invalid @enderror">
                @error('hospitalName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" cols="10" rows="5">{{$hospital->address}}</textarea>
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
                        name="cityId" id="cityId" value="{{$hospital->cityId}}" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             @foreach ($city as $citydata)
                                <option value="{{$citydata->id}}" {{$citydata->id == old('cityId',$hospital->cityId) ? 'selected':'' }}>{{$citydata->name}}</option> 
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
                <input type="text" value="{{$hospital->contactNo}}" name="contactNo" id="contactNo" class="form-control @error('contactNo') is-invalid @enderror">
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
                        name="hospitalTypeId" id="hospitalTypeId" value="{{$hospital->hospitalTypeId}}" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                         @foreach ($hospitaltype as $hospitaltypedata)
                                <option value="{{$hospitaltypedata->id}}" {{$hospitaltypedata->id == old('hospitalTypeId',$hospital->hospitalTypeId) ? 'selected':'' }}>{{$hospitaltypedata->typeName}}</option> 
                        @endforeach
                             
                    </select>
                    @error('hospitalTypeId')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>
{{-- Auth User --}}
<input type="hidden" name="userId" value="{{Auth::User()->id}}">
{{--  --}}  
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Site Url</strong>
                <input type="text" value="{{$hospital->siteUrl}}" id="siteUrl" name="siteUrl" class="form-control @error('category') is-invalid @enderror">
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
                             <option value="{{$hospital->category}}">{{$hospital->category}}</option>
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
                    <img src="{{asset('hospital')}}/{{$hospital->hospitalLogo}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                </div>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hospital Time:</strong>
                <input type="hospitalTime" name="hospitalTime" id="hospitalTime" value="{{$hospital->hospitalTime}}" class="form-control @error('hospitalTime') is-invalid @enderror">
                @error('hospitalTime')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Service:</strong>
                <input type="text" name="services" id="services"  value="{{$hospital->services}}" class="form-control @error('services') is-invalid @enderror">
                @error('services')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
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
            hospitalTime:{
                required:"Please Enter Hospital Time"
            },
            services:{
                required:"Please Enter services"
            }
            
        },
        submitHandler:function(form){
            form.submit();
        }
    });
</script>
@endsection