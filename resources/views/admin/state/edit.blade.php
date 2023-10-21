@extends('layouts.app')
@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">State Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('state.index') }}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('state.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="slug" value="{{$state->slug}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>State Name:</strong>
                <input type="text" name="stateName" value="{{$state->stateName}}" class="form-control @error('stateName') is-invalid @enderror">
                @error('stateName')
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
            stateName:{
                required:true,
                minlength:5,
                maxlength:200
            },
            	
        },
        messages:{
            stateName:{
                required:"Please Enter Name",
                minlength:"Title Minimum of 5 Character Long"
            },
        },
        submitHandler:function(form){
            form.submit();
        }
    });
    </script>

@endsection