@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Specialist Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('specialist.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form action="{{route('specialist.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Specialist Name:</strong>
                <input type="text" name="specialistName" class="form-control @error('specialistName') is-invalid @enderror">
                @error('specialistName')
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




@endsection