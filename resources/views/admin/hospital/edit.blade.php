@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">City Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('hospital.index') }}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form action="{{route('hospital.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="hospitalId" value="{{$hospital->id}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hospital Name:</strong>
                <input type="text" value="{{$hospital->hospitalName}}" name="hospitalName" class="form-control @error('hospitalName') is-invalid @enderror">
                @error('hospitalName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <textarea name="address" id="editor1" class="form-control @error('address') is-invalid @enderror" cols="10" rows="5">{{$hospital->address}}</textarea>
                @error('address')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select City</strong>
                    <br>
                    <select class="form-select form-control-user @error('cityId') is-invalid @enderror"
                        name="cityId" value="{{$hospital->cityId}}" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select City</option>
                             @foreach ($city as $city)
                                <option value={{$city->id}}>{{$city->name}}</option> 
                             @endforeach
                    </select>
                    @error('cityId')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact No</strong>
                <input type="text" value="{{$hospital->contactNo}}" name="contactNo" class="form-control @error('contactNo') is-invalid @enderror">
                @error('contactNo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Hospital Type</strong>
                    <br>
                    <select class="form-select form-control-user @error('hospitalTypeId') is-invalid @enderror"
                        name="hospitalTypeId" value="{{$hospital->hospitalTypeId}}" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select Hospital Type</option>
                             <option value=1>One</option>
                             <option value=2>Two</option>
                            </select>
                    @error('hospitalTypeId')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select User</strong>
                    <br>
                    <select class="form-select form-control-user @error('userId') is-invalid @enderror"
                        name="userId" value="{{$hospital->userId}}" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select User</option>
                             <option value=1>One</option>
                             <option value=2>Two</option>
                    </select>
                    @error('userId')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Site Url</strong>
                <input type="text" value="{{$hospital->siteUrl}}" name="siteUrl" class="form-control @error('category') is-invalid @enderror">
                @error('siteUrl')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category</strong>
                <input type="text" value="{{$hospital->category}}" name="category" class="form-control @error('siteUrl') is-invalid @enderror">
                @error('category')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btnsubmit">Submit</button>
        </div>

    </form>
    </div>
</div>
@endsection