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
        <ul class="nav nav-tabs">
            <li class="active"><a href="#doctor" data-toggle="tab">Doctor</a></li>
            <li><a href="#gallery" data-toggle="tab">Gallery</a></li>
            <li><a href="#facility" data-toggle="tab">Facility</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="doctor">
                <div class="table-responsive">
                    <div class="mb-4 pull-right"><a class="btn addbtn" href="{{route('admin.doctor.create',['id' => request()->route('id')])}}"> Add Doctor</a></div>

                    <table class="table table-bordered">
                        <tr>
                            <th>Hospital</th>
                            <th>Doctor Name</th>
                            <th>Contact No</th>
                            <th>Specialist</th>
                            <th>User</th>
                            <th>Photo</th>
                            <th>Experience</th>
                            <th>Register Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($doctor as $doctors)
                            <tr>
                                 <td>{{$doctors->hospital->hospitalName}}</td>
                                <td>{{$doctors->doctorName}}</td>
                                <td>{{$doctors->contactNo}}</td>
                                <td>{{$doctors->specialist->specialistName}}</td>
        
                                <td>{{$doctors->user->name}}</td>
                                
                                <td>
                                    <img src="{{url('doctor')}}/{{$doctors->photo}}" alt="" width="200" height="200">

                                </td>
                                <td>{{$doctors->experience}}</td>
                                <td>{{$doctors->registerNumber}}</td>
                                <td>{{$doctors->status}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('admin.doctor.edit')}}{{$doctors->id}}">Edit</a>
                                    
                                    <a class="btn btn-danger mt-1" onclick="return confirm('Are you sure want to delete?')" href="{{route('admin.doctor.delete')}}{{$doctors->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    
                    {!! $doctor->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
            </div>
            <div class="tab-pane" id="gallery">
                <div class="table-responsive">
                    <div class="mb-4 pull-right"><a class="btn addbtn" href="{{ route('admin.gallery.create',['id' => request()->route('id')])}}"> Add Gallery</a></div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Hospital</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                        @foreach ($gallery as $gallerys)
                            <tr>
                                <td>{{$gallerys->hospital->hospitalName}}</td>
                                <td>{{$gallerys->title}}</td>
                                <td>
                                    <img src="{{url('gallery')}}/{{$gallerys->photo}}" alt="" width="200" height="200">
                                </td>
                                <td>{{$gallerys->status}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('admin.gallery.edit')}}{{$gallerys->id}}">Edit</a>
                                    <a class="btn btn-danger mt-1" onclick="return confirm('Are you sure want to delete?')" href="{{route('admin.gallery.delete')}}{{$gallerys->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! $gallery->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
                {{-- {!! $data->render() !!} --}}
            </div>
            <div class="tab-pane" id="facility">
                <div class="table-responsive">
                    <div class="mb-4 pull-right"><a class="btn addbtn" href="{{ route('admin.facility.create',['id' => request()->route('id')]) }}"> Add Facility</a></div>

                    <table class="table table-bordered">
                        <tr>
                            <th>Hospital</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                        @foreach ($facility as $facilitys)
                            <tr>
                                <td>{{$facilitys->hospital->hospitalName}}</td>
                                <td>{{$facilitys->title}}</td>
                                <td>
                                    <img src="{{url('facility')}}/{{$facilitys->photo}}" alt="" width="200" height="200">
                                </td>
                                <td>{{$facilitys->status}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('admin.facility.edit')}}{{$facilitys->id}}">Edit</a>
                                    <a class="btn btn-danger mt-1" onclick="return confirm('Are you sure want to delete?')" href="{{route('admin.facility.delete')}}{{$facilitys->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! $facility->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
                {{-- {!! $data->render() !!} --}}
            </div>
        </div>

        
        {{-- <div class="container gap-5">
            
            <ul class="nav nav-pills gap-5">
              <li><a href="{{route('admin.doctor.index')}}{{$hospital->id}}" style="color:#7C96AB;font-size:22px">Doctor</a></li>
              <li><a href="{{route('admin.gallery.index')}}{{$hospital->id}}" style="color:#7C96AB;font-size:22px">Gallery</a></li>
              <li><a href="{{route('admin.facility.index')}}{{$hospital->id}}" style="color:#7C96AB;font-size:22px">Facilty</a></li>
            </ul>
        </div> --}}
        {{-- <div class="d-flex justify-content-center gap-5 mb-5">
            <a class="btn mt-5 ms-5 me-5 p-4" style="background-color:#7C96AB;color:white;font-size:18px;" href="{{route('admin.doctor.index')}}{{$hospital->id}}">Doctor</a>
         
            <a class="btn btn-secondary mt-5 ms-5 me-5 p-4" style="background-color:#7C96AB;color:white;font-size:18px;" href="{{route('admin.gallery.index')}}{{$hospital->id}}">Gallery</a>

            <a class="btn btn-secondary mt-5 ms-5 me-5 p-4" style="background-color:#7C96AB;color:white;font-size:18px;" href="{{route('admin.facility.index')}}{{$hospital->id}}">Facality</a>
        </div> --}}
        
    </div>
</div>

    {{-- <div class="card">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Home</a></li>
            <li><a href="#tab2" data-toggle="tab">About</a></li>
            <li><a href="#tab3" data-toggle="tab">Contact</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                Home
            </div>
            <div class="tab-pane" id="tab2">
                About
            </div>
            <div class="tab-pane" id="tab3">
                Contact
            </div>
        </div>

    </div> --}}
@endsection
