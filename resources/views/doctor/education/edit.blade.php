@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Education</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('education.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form action="{{route('education.update')}}" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden"  value="{{$education->id}}" name="id">
           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Doctor ID </strong> 
                    <select type="text" name="doctorId"  value="{{$education->doctorId}}" class="form-control @error('doctorId') is-invalid @enderror">
                 <option selected disabled><strong >Select here...  </strong></option>
                 @foreach ($doctor as $doctor)
                 <option value="{{$doctor->id}}">{{$doctor->doctorName}}</option>
                 @endforeach
                </select>
                @error('doctorId')
                 <sapn class="text-danger">{{ $message }}</sapn>
                 @enderror
             </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                       <strong> Education</strong>
                       <textarea class="form-control @error('education')is-invalid @enderror" name="education" id="exampleTextarea" rows="3">{{$education->education}}</textarea>
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
</div>

@endsection