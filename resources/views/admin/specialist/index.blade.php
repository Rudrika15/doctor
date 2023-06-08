@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Specialist Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('specialist.create') }}"> Add Specialist</a></div>
    </div>
    <form id="frm" class="mt-5" action="{{route('specialist.index')}}" method="get" >

        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" list="magicHoues1" id="specialistName" name="specialistName" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Specialist Name">
                <datalist id="magicHoues1">
                    @foreach ($specialist as $specialistName)
                        <option value="{{$specialistName->specialistName}}"></option>    
                    @endforeach
                </datalist>
                @error('specialistName')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" list="magicHoues2" id="status" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Enter Status">
                <datalist id="magicHoues2">
                    @foreach ($specialist as $status)
                        <option value="{{$status->status}}"></option>    
                    @endforeach
                </datalist>
                @error('specialistName')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
    
        
        
        <div class="col-lg-4 text-center gap-5">
            <button type="submit" class="btn btn-primary">Search</button>
            <a class=" btn btnsubmit" href="{{route('specialist.index')}}">Clear</a>

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

                @if ($count==0)
                    <td colspan="3" class="display-3 text-center text-danger">No data found</td>
                @endif
            </table>
            {!! $specialist->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection