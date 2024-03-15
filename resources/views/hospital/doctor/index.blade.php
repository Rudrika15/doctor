@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Doctor Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('doctor.create')}}"> Add Doctor</a></div>
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
                    <th>Doctor Name</th>
                    <th>Contact Number</th>
                    <th>Specialist Name</th>
                    <th>User Name</th>
                    <th>Photo</th>
                    <th>Experiance</th>
                    <th>Register Number</th>
                    <th> Status</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($doctor as $doctors)
                <tr>
                    <td>{{ $doctors->doctorName }}</td>
                    <td>{{ $doctors->contactNo }}</td>
                    <td>{{ $doctors->specialist->specialistName	 }}</td>
                    <td>{{ $doctors->user->name }}</td>
                    <td> <img src="{{url('/doctor')}}/{{$doctors->photo}}" alt=""> </td>
                    <td>{{ $doctors->experience }}</td>
                    <td>{{ $doctors->registerNumber }}</td>
                    <td>{{ $doctors->status }}</td>

                    {{-- <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif
                    </td> --}}
                    <td>
                        {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                        <a class="btn btn-success" href="{{route('doctor.edit')}}{{$doctors->id}}">Edit</a> <br><br>
                        <a onclick="return confirm('Are you sure want to delete ?')" class="btn btn-danger" href="{{route('doctor.destroy')}}{{$doctors->id}}">Delete</a>
                        {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!} --}}
                        <a class="btn btn-info" href="{{route('schedule.create')}}{{$doctors->id}}">Add Schedule</a> <br><br>

                    </td>

                </tr>
                @endforeach
            </table>
        </div>
        {!! $doctor->withQueryString()->links('pagination::bootstrap-5') !!}

        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection