@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Slider  Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('admin.slider.create') }}"> Add Slider</a></div>
    </div>
    <form id="frm" class="mt-5" action="{{route('admin.slider.index')}}" method="get" >

        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" id="title" name="title" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Title">
                @error('title')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
    
        <div class="col-lg-4">
            <div class="form-group">
                    <select class="form-select form-control-user @error('place') is-invalid @enderror"
                        name="place" id="place" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>---Select Place---</option>
                             <option value="inside">inside</option>
                             <option value="outside">outside</option>         
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                    <select class="form-select form-control-user @error('status') is-invalid @enderror"
                        name="status" id="status" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>---Select Status---</option>
                             <option value="Active">Active</option>
                             <option value="Delete">Delete</option>
                             
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>
        
        <div class="col-lg-2 text-center gap-5">
            <button type="submit" class="btn btn-primary">Search</button>
            <a class=" btn btnsubmit" href="{{route('admin.slider.index')}}">Clear</a>

        </div>
    
    </form>
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
                        <td><img src="{{url('slider')}}/{{$sliders->image}}" alt="" width="200px" height="200px"></td>
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
            {!! $slider->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>

@endsection