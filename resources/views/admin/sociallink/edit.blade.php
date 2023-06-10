@extends('layouts.app')
@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Social Link Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('admin.hospital.viewdetails',['id'=> request()->route('id')])}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

    <form id="frm" action="{{route('admin.sociallink.update')}}" method="POST" >
        @csrf
        <input type="hidden1" name="socialId" value="{{$sociallink->id}}" class="form-control @error('doctorName') is-invalid @enderror">

        <input type="hidden1" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" id="title" name="title" value="{{$sociallink->title}}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Link:</strong>
                <input type="text" id="link" name="link" value="{{$sociallink->link}}" class="form-control @error('link') is-invalid @enderror">
                @error('link')
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

{{-- Jquery Validation --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>

<script>

    jQuery('#frm').validate({
        rules:{
            title:{
                required:true,
                minlength:5,
                maxlength:300
            },
            link:{
                required:true,
                minlength:5,   
            },
            hospitalId:{
                required:true,
            }
            	
        },
        messages:{
            title:{
                required:"Please Enter Name",
                minlength:"Title Minimum of 5 Character Long"
            },
            link:{
                required:"Please Enter Name",
                minlength:"Title Minimum of 5 Character Long"
            },
            hospitalId:{
                required:"Please Select Hospital"
            }
        },
        submitHandler:function(form){
            form.submit();
        }
    });
    </script>

@endsection