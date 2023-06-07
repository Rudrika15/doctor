@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Blog</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('blog.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form action="{{route('blog.store')}}" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
            @csrf
        

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title </strong>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                      <strong> Details</strong>
                      <textarea class="form-control @error('detail')is-invalid @enderror" name="detail" id="exampleTextarea" rows="3"></textarea>
                      @error('detail')
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
                        <img src="{{url('blog/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                    </div>
                    
                </div>
            </div>
                    
            <input type="hiddenn" name="doctorId" value="{{Auth::Doctor()->id}}">
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                <strong>Doctor Name </strong> 
                 <select type="text" name="doctorId" class="form-control @error('doctorId') is-invalid @enderror">
                 <option selected disabled><strong >Select here...  </strong></option>
                 @foreach ($doctor as $doctor)
                 <option value="{{$doctor->id}}">{{$doctor->doctorName}}</option>
             @endforeach
                 </select>
                 @error('doctorId')
                 <sapn class="text-danger">{{ $message }}</sapn>
                 @enderror
             </div>
         
             </div> --}}


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




@endsection