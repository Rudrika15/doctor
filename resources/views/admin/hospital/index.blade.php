@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Hospital Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('hospital.create') }}"> Add Hospital</a></div>
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
                        
                    
                    <th>Hospital Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Contact No</th>
                    <th>Hospital Type</th>
                    <th>User</th>
                    <th>Site Url</th>
                    <th>Category</th>
                    <th>Hospital Logo</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
                @foreach ($hospital as $hospitals)
                    <tr>
                        <td>{{$hospitals->hospitalName}}</td>
                        <td>{{$hospitals->address}}</td>

                        @foreach ($hospitals->city as $city)
                            <td>{{$city->name}}</td>
                        @endforeach

                            <td>{{$hospitals->contactNo}}</td>

                        @foreach ($hospitals->hospitaltype as $hospitaltype)
                            <td>{{$hospitaltype->typeName}}</td> 
                        @endforeach

                       
                             <td>{{$hospitals->user->name}}</td> 
                        
                        
                        <td>{{$hospitals->siteUrl}}</td>
                        <td>{{$hospitals->category}}</td>
                        <td><img src="{{url('/hospital')}}/{{$hospitals->hospitalLogo}}"></td>

                        <td>{{$hospitals->status}}</td>
                        
                        <td>
                            <a class="btn btn-success mt-1" href="{{route('admin.hospital.viewdetails')}}{{$hospitals->id}}">View Details</a>
                    
                            <a class="btn btn-primary mt-2" href="{{route('hospital.edit')}}{{$hospitals->id}}">Edit</a>
                    
                            <a class="btn btn-danger mt-2" onclick="return confirm('Are you sure want to delete?')" href="{{route('hospital.delete')}}{{$hospitals->id}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $hospital->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>

@endsection