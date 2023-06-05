@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Schedule</h2>
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
                <th>Hospital Name</th>
                <th>Doctor Name</th>
                {{-- <th>Patient Name</th>
                <th>Schedule</th>
                --}}
                {{-- <th>Status</th> --}}
               
                {{-- <th width="280px">Action</th> --}}
            </tr>
            @foreach ($appointment as $appointments)
            <tr>
                {{-- @foreach ($schedules->hospital as $hospital)
                    
                <td>{{ $hospital->hospitalName }}</td>
                @endforeach

                @foreach ($schedules->doctor as $doctor)
                    
                <td>{{ $doctor->doctorName }}</td>
                @endforeach --}}

                <td>{{ $appointments->hospital->hospitalName }}</td>
                <td>{{ $appointments->doctor->doctorName }}</td>
                {{-- <td>{{ $appointments->p}}</td>
                <td>{{ $appointments->status }}</td> --}}
                
                {{-- <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif
                </td> --}}
                {{-- <td> --}}
                    {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                    {{-- <a class="btn btn-success" href="{{route('schedule.edit')}}{{$schedules->id}}">Edit</a>  --}}


                    {{-- <a onclick="return confirm('Are you sure want to delete  ?')" class="btn btn-danger" href="{{route('schedule.destroy')}}{{$schedules->id}}">Delete</a> --}}

                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!} --}}
                {{-- </td> --}}
            </tr>
            @endforeach
        </table>
        {!! $appointment->withQueryString()->links('pagination::bootstrap-5') !!}

        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection