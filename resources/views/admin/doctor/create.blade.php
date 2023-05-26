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

        <form action="" method="" enctype="multipart/form-data">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select Hospital Type</strong>
                    <br>
                    <select class="form-select form-control-user @error('hospitalId') is-invalid @enderror"
                        name="hospitalId" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select City</option>
                             <option value=1>One</option>
                    </select>
                    @error('hospitalId')
                        <span class="invalid-feedback" role="alert">
                        {{$message}}
                        </span>
                    @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Doctor Name:</strong>
                <input type="text" name="doctorName" class="form-control @error('doctorName') is-invalid @enderror">
                @error('doctorName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact No</strong>
                <input type="text" name="contactNo" class="form-control @error('contactNo') is-invalid @enderror">
                @error('contactNo')
                    <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select Specialist</strong>
                    <br>
                    <select class="form-select form-control-user @error('specialistId') is-invalid @enderror"
                        name="specialistId" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select Specialist</option>
                             <option value=1>One</option>
                    </select>
                    @error('specialistId')
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
                        name="userId" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
                         aria-label="Default select example">
                             <option selected disabled>Select User</option>
                             <option value=1>One</option>
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
                <strong>Experience:</strong>
                <textarea name="experience" id="editor1" class="form-control @error('experience') is-invalid @enderror" cols="10" rows="5"></textarea>
                @error('experience')
                <sapn class="text-danger">{{ $message }}</sapn>
                @enderror
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Register No</strong>
                <input type="text" name="registerNumber" class="form-control @error('registerNumber') is-invalid @enderror">
                @error('registerNumber')
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