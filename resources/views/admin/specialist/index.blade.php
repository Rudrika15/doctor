@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Specialist Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('specialist.create') }}"> Add Specialist</a></div>
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
                    <th>Specialist Name</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($specialist as $specialists)
                <tr>
                    <td>{{$specialists->specialistName}}</td>
                    <td>{{$specialists->status}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('specialist.edit')}}{{$specialists->id}}">Edit</a>
                    
                        <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" href="{{route('specialist.delete')}}{{$specialists->id}}">Delete</a>
                    </td>

                </tr>
                @endforeach
            </table>
            {!! $specialist->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection