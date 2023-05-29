@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">{{$hospital->hospitalName}}</h2>
        {{-- <div class="pt-2"><a class="btn addbtn" href="{{ route('hospital.create') }}"> Add Hospital</a></div> --}}
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        
        <div class="container gap-5">
            
            <ul class="nav nav-pills gap-5">
              <li><a href="{{route('admin.doctor.index')}}{{$hospital->id}}" style="color:#7C96AB;font-size:22px">Doctor</a></li>
              <li><a href="{{route('admin.gallery.index')}}{{$hospital->id}}" style="color:#7C96AB;font-size:22px">Gallery</a></li>
              <li><a href="{{route('admin.facility.index')}}{{$hospital->id}}" style="color:#7C96AB;font-size:22px">Facilty</a></li>
            </ul>
          </div>
        {{-- <div class="d-flex justify-content-center gap-5 mb-5">
            <a class="btn mt-5 ms-5 me-5 p-4" style="background-color:#7C96AB;color:white;font-size:18px;" href="{{route('admin.doctor.index')}}{{$hospital->id}}">Doctor</a>
         
            <a class="btn btn-secondary mt-5 ms-5 me-5 p-4" style="background-color:#7C96AB;color:white;font-size:18px;" href="{{route('admin.gallery.index')}}{{$hospital->id}}">Gallery</a>

            <a class="btn btn-secondary mt-5 ms-5 me-5 p-4" style="background-color:#7C96AB;color:white;font-size:18px;" href="{{route('admin.facility.index')}}{{$hospital->id}}">Facality</a>
        </div> --}}
        
    </div>
</div>
@endsection
