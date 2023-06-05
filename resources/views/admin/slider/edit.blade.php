@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Slider Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('admin.slider.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form action="{{route('admin.slider.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <input type="hidden" name="sliderId" value="{{$slider->id}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="title" value="{{$slider->title}}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
       
       
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Select Image </strong>
            <div class="row">
                <div class="col-md-4">
                    <input type="file" accept='image/*' value="{{$slider->image}}" onchange="readURL(this,'#img1')" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="image"></label>
                    <img src="/admin_img/{{$slider->image}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                </div>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select Place</strong>
                    <br>
                    <select class="form-select form-control-user @error('place') is-invalid @enderror"
                        name="place" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                            
                             <option value="{{$slider->place}}">{{$slider->place}}</option>
                             <option value="inside">Inside</option>
                             <option value="outside">Outside</option>  
                    </select>
                    @error('place')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Navigate</strong>
                <input type="text" name="navigate" value="{{$slider->navigate}}" class="form-control @error('navigate') is-invalid @enderror">
                @error('navigate')
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
@endsection