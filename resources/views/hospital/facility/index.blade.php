@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Facility</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('facility.create')}}"> Add Facility</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Hospital ID</th>
                <th>Title</th>
                <th>Photo</th>
                <th>Status</th>
               
                <th width="280px">Action</th>
            </tr>
            @foreach ($facility as $facilities)
            <tr>
                <td>{{ $facilities->hospitalId }}</td>
                <td>{{ $facilities->title }}</td>
                <td> <img src="/photo/{{$facilities->photo}}" alt="" style="min-height:100px;min-width:100px;max-height:100px;max-width:100px"> </td>
                <td>{{ $facilities->status }}</td>
                
                {{-- <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif
                </td> --}}
                <td>
                    {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                    <a class="btn btn-success" href="{{route('facility.edit')}}{{$facilities->id}}">Edit</a> 
                    <a onclick="return confirm('Are you sure want to delete  ?')" class="btn btn-danger" href="{{route('facility.destroy')}}{{$facilities->id}}">Delete</a>

                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!} --}}
                </td>
            </tr>
            @endforeach
        </table>
        {!! $facility->withQueryString()->links('pagination::bootstrap-5') !!}

        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection