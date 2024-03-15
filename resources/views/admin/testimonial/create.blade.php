@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Testimonial Create</h2>

        <div class="pt-2"><a class="btn addbtn" href="{{ route('admin.testimonial.index',['id' => request()->route('id')]) }}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('admin.testimonial.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sub-Title</strong>
                    <input type="text" name="subTitle" id="subTitle" class="form-control @error('subTitle') is-invalid @enderror">
                    @error('subTitle')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details</strong>
                    <input type="text" name="details" id="details" class="form-control @error('details') is-invalid @enderror">
                    @error('details')
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    jQuery('#frm').validate({
        rules: {
            title: {
                required: true,

            },
            subTitle: {
                required: true,

            },
            details: {
                required: true,

            },


        },
        messages: {
            title: {
                required: "Please Enter Title",
            },
            subTitle: {
                required: "Please Enter Sub-Title",
            },
            details: {
                required: "Please Enter details",
            },

        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>
@endsection