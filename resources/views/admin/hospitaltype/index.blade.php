@extends('layouts.app')

@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Hospital Type Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('hospitaltype.index') }}">Add Hospital Type</a></div>
    </div>
     {{-- For Filler And Search Data Star --}}
     <form id="frm" action="{{route('hospitaltype.index')}}" method="get" class="mt-5">
            
        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" list="magicHouses" name="typeName" id="typeName" class="form-control @error('typeName') is-invalid @enderror" placeholder="Enter Hopital Type">
                <datalist id="magicHouses">
                    @foreach ($hospitaltype as $typeName)
                        <option value={{$typeName->typName}}>
                    @endforeach
                </datalist>
                @error('typeName')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" list="magicHouses3" id="status" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Enter Status">
                <datalist id="magicHouses3">
                    @foreach ($hospitaltype as $status)
                        <option value={{$status->status}}>
                    @endforeach
                </datalist>
                @error('place')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>   
              
        <div class="col-lg-4  text-center">
            <button type="submit" class="btn btn-primary">Search</button>
            <a class=" btn btnsubmit" href="{{route('hospitaltype.index')}}">Clear</a>
        </div>

    </form>

    {{-- For Filler And Search Data End --}}
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
                @if($count ==0)
                
                <tr>
                    <td colspan="3" class="display-3 text-center text-danger">No data found</td>
                </tr>

                @endif
               
            </table>
            {!! $hospitaltype->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection