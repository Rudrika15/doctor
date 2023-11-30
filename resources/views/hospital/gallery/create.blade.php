@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Gallery</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('gallery.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('gallery.store')}}" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="hospitalId" value="{{$hospital->id}}">
          
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title </strong>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Select Image </strong>
                <div class="row">
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
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btnsubmit">Submit</button>
            </div>

        </form>
       
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
         
        
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
  
    <script>
        jQuery('#frm').validate({
        rules:{
                hospitalId:"required",
                title:{
                    required:true,
                    maxlength:15,
                },
                photo:"required",
        },messages:{
                    hospitalId:"Please Enter Hospital Name",
                    title:{
                        required:"Please Enter Title",
                    },
                    photo:"Please Select Image",
            },
        submitHandler:function(form)
        {
             form.submit();
        }
        });
     </script>




@endsection