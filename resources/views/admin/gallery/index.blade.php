@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Gallery Management</h2>
        {{-- <div class="pt-2"><a class="btn addbtn" href="{{ route('admin.doctor.create') }}"> Add Doctor</a></div> --}}
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
                @foreach ($gallery as $gallerys)
                    <tr>
                        <td>{{$gallerys->hospital->hospitalName}}</td>
                        <td>{{$gallerys->title}}</td>
                        <td>
                            <img src="/admin_img/{{$gallerys->photo}}" alt="" width="200" height="200">
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
</div>

@endsection