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
                <input type="text" list="magicHouses" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title">
                <datalist id="magicHouses">
                    @foreach ($slider as $searchslider)
                        <option value={{$searchslider->title}}>
                    @endforeach
                </datalist>
                @error('title')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" list="magicHousess" id="place" name="place" class="form-control @error('place') is-invalid @enderror" placeholder="Enter Place">
                <datalist id="magicHousess">
                    @foreach ($slider as $place)
                        <option value={{$place->place}}>
                    @endforeach
                </datalist>
                @error('place')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" list="magicHouses3" id="status" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Enter Status">
                <datalist id="magicHouses3">
                    @foreach ($slider as $status)
                        <option value={{$status->status}}>
                    @endforeach
                </datalist>
                @error('place')
                <sapn class="text-danger">{{ $message }}</sapn>
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
                
                @if($count==0)
                <tr>
                    <td colspan="6" class="display-3 text-center text-danger">No data found</td>
                </tr>
                @endif
            </table>
            {!! $slider->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    
@endsection










