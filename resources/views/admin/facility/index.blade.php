@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Facility Management</h2>
        
        <div class="pt-2"><a class="btn addbtn" href="{{ route('admin.facility.create',['id' => request()->route('id')]) }}"> Add Facility</a></div>
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
                            <img src="/admin_img/{{$facilitys->photo}}" alt="" width="200" height="200">
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

@endsection