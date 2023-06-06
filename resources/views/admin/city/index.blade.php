@extends('layouts.app')
@section('content')

<div class="card" style="">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">City Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('city.create') }}"> Add City</a></div>
    </div>
    <form id="frm" class="mt-5" action="{{route('city.index')}}" method="get" >

        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" id="name" name="cityName" class="form-control @error('name') is-invalid @enderror" placeholder="Enter City Name">
                @error('name')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
    
        <div class="col-lg-4">
            <div class="form-group">
                
                <input type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Enter Status">
                @error('status')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
    
        
        <div class="col-lg-4 text-center gap-5">
            <button type="submit" class="btn btnsubmit">Search</button>
            <button type="submit" class="btn btnsubmit">Clear</button>

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
                    <th>Name</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($city as $citys)
                <tr>
                    <td>{{$citys->name}}</td>
                    <td>{{$citys->status}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('city.edit')}}{{$citys->id}}">Edit</a>
                    
                        <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" href="{{route('city.delete')}}{{$citys->id}}">Delete</a>
                    </td>

                </tr>
                @endforeach
            </table>
            {!! $city->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection