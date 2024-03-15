@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Appointment</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('appointment.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Message</th>
                <th>State</th>
                <th>City</th>
                <th>Hospital</th>
                <th>Doctor</th>
                <th>Schedule</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
               
                {{-- <th width="280px">Action</th> --}}
            </tr>
            @foreach ($appointment as $appointments)
            <tr>
                <td>{{$appointments->name}}</td>
                <td>{{$appointments->email}}</td>
                <td>{{$appointments->contactNo}}</td>
                <td>{{$appointments->message}}</td>
                <td>{{$appointments->state->stateName}}</td>
                <td>{{$appointments->city->name}}</td>
                <td>{{ $appointments->hospital->hospitalName }}</td>
                <td>{{ $appointments->doctor->doctorName }}</td>
                <td>{{ $appointments->schedule->day}}</td>
                <td>{{ $appointments->category->categoryName}}</td>
                <td>{{ $appointments->status}}</td>
                <td>
                    <a class="btn btn-success" href="">Confirm</a>
                    <a onclick="return confirm('Are you sure want to delete ?')" class="btn btn-danger mt-1" href="">Delete</a>  
                </td>
                
            </tr>
            @endforeach
        </table>
        {!! $appointment->withQueryString()->links('pagination::bootstrap-5') !!}

        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection