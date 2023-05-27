@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Hospital Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('hospital.create') }}"> Add Hospital</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        
        <div class="d-flex justify-content-center gap-5 mb-5">
            <a class="btn mt-5 ms-5 me-5 p-4" style="background-color:#7C96AB;color:white;font-size:18px;" href="{{route('admin.doctor.index')}}{{$hospital->id}}">Doctor</a>
         
            <a class="btn btn-secondary mt-5 ms-5 me-5 p-4" style="background-color:#7C96AB;color:white;font-size:18px;" href="{{route('admin.gallery.index')}}{{$hospital->id}}">Gallery</a>

            <a class="btn btn-secondary mt-5 ms-5 me-5 p-4" style="background-color:#7C96AB;color:white;font-size:18px;" href="{{route('admin.facility.index')}}{{$hospital->id}}">Facality</a>
        </div>
        

    </div>
</div>
@endsection
