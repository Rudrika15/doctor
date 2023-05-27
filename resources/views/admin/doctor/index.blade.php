@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Doctor Management</h2>
        
        <div class="pt-2"><a class="btn addbtn" href="{{route('admin.doctor.create',['id' => request()->route('id')])}}"> Add Doctor</a></div>
        
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="table-responsive">
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
                            <img src="/admin_img/{{$doctors->photo}}" alt="">
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
        {{-- {!! $data->render() !!} --}}
    </div>
</div>

@endsection