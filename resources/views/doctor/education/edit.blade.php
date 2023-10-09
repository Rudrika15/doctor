@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Update Education</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('education.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('education.update')}}" method="POST">
            @csrf
            <input type="hiddena"  value="{{$education->id}}" name="id">
            {{-- <input type="text"  value="{{$doctorId->id}}" name="doctorId"> --}}

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                       <strong> Education</strong>
                       <textarea class="form-control @error('education')is-invalid @enderror" name="education" id="education" rows="3">{{$education->education}}</textarea>
                       @error('education')
                       <sapn class="text-danger">{{ $message }}</sapn>
                       @enderror
                   </div>
               </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btnsubmit">Update</button>
            </div>

        </form>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
         
    <script>
      jQuery('#frm').validate({
      rules:{
         
       education:"required",
         
          
      },messages:{
        
       education:"Please enter education detail",
         
      },
      submitHandler:function(form){
          form.submit();
      }
  });
</script>
</div>

@endsection