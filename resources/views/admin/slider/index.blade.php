@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Slider  Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('admin.slider.create') }}"> Add Slider</a></div>
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Place</th>
                    <th>Navigate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($slider as $sliders)
                    <tr>
                        <td>{{$sliders->title}}</td>
                        <td><img src="/admin_img/{{$sliders->image}}" alt="" width="200px" height="200px"></td>
                        <td>{{$sliders->place}}</td>
                        <td>{{$sliders->navigate}}</td>
                        <td>{{$sliders->status}}</td>
                        <td>
                            <a class="btn btn-primary mt-2" href="{{route('admin.slider.edit')}}{{$sliders->id}}">Edit</a>
                    
                            <a class="btn btn-danger mt-2" onclick="return confirm('Are you sure want to delete?')" href="{{route('admin.slider.delete')}}{{$sliders->id}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                
            </table>
            {{-- {!! $hospital->withQueryString()->links('pagination::bootstrap-5') !!} --}}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>

@endsection