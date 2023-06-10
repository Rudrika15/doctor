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
                    <input type="text" list="magicHouses" id="cityName" name="cityName" class="form-control @error('cityName') is-invalid @enderror" placeholder="Enter City Name">
                    <datalist id="magicHouses">
                        @foreach ($city as $cityname)
                        <option value={{$cityname->cityName}}>
                         @endforeach
                    </datalist>
                   
                    @error('cityName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
        </div>
       
        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" id="magicHousesss" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Enter Status">
                <datalist id="magicHousesss">
                    @foreach ($city as $status)
                    <option value={{$status->status}}>
                    @endforeach
                </datalist>
                @error('status')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
    
        <div class="col-lg-4 text-center gap-5">
            <button type="submit" class="btn btn-primary">Search</button>
            <a class=" btn btnsubmit" href="{{route('city.index')}}">Clear</a>
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

                @if ($count==0)
                    <td colspan="3" class="display-3 text-center text-danger">No data found</td>
                @endif
            </table>
            {!! $city->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection