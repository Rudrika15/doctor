@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Hospital Type Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('hospitaltype.create') }}">Add Hospital TYpe</a></div>
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
                    <th>Type Name</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($hospitaltype as $hospitaltypes)
                <tr>
                    <td>{{$hospitaltypes->typeName}}</td>
                    <td>{{$hospitaltypes->status}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('hospitaltype.edit')}}{{$hospitaltypes->id}}">Edit</a>
                    
                        <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" href="{{route('hospitaltype.delete')}}{{$hospitaltypes->id}}">Delete</a>
                    </td>

                </tr>
                @endforeach
            </table>
            {!! $hospitaltype->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection