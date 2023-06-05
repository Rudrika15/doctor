@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Doctor Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('schedule.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form action="{{route('schedule.store')}}"  method="POST">
            @csrf
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                      <strong>Hospital ID </strong> 
                    <select type="text" name="hospitalId" class="form-control @error('hospitalId') is-invalid @enderror">
                    <option selected disabled><strong >Select here...  </strong></option>
                    <option value=1 ><strong >aaa</strong></option>
                    <option value=2 ><strong >bbb</strong></option>
                    </select>
                    @error('hospitalId')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Doctor ID </strong> 
                      <select type="text" name="doctorId" class="form-control @error('doctorId') is-invalid @enderror">
                      <option selected disabled><strong >Select here...  </strong></option>
                     @foreach ($doctor as $doctor)
                     <option value="{{$doctor->id}}">{{$doctor->doctorName}}</option>

                     @endforeach
                      </select>
                      @error('doctorId')
                      <sapn class="text-danger">{{ $message }}</sapn>
                      @enderror
                  </div>
              </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Day </strong>
                    <input type="date" name="day" class="form-control @error('day') is-invalid @enderror">
                    @error('day')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Session</strong>
                    <input type="text" name="session" class="form-control @error('session') is-invalid @enderror">
                    @error('session')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Time</strong>
                    <input type="number" name="time" class="form-control @error('time') is-invalid @enderror">
                    @error('time')
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