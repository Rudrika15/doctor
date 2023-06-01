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

        <form action="{{route('schedule.update')}}"  method="POST" >
            @csrf
            <input type="hidden" value="{{$schedule->id}}" name="id">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                      <strong>Hospital ID </strong> 
                    <select type="text" value="{{$schedule->hospitalId}}" name="hospitalId" class="form-control @error('hospitalId') is-invalid @enderror">
                    <option selected disabled><strong >Select here...  </strong></option>
                    <option value=1 ><strong > aaa</strong></option>
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
                      <select type="text" value="{{$schedule->doctorId}}" name="doctorId" class="form-control @error('doctorId') is-invalid @enderror">
                      <option selected disabled><strong >Select here...  </strong></option>
                      @foreach ($doctor as $doctordata)
                      <option value="{{$doctordata->id}}" {{$doctordata->id==old('doctorId',$schedule->doctorId)? 'selected':''}}>{{$doctordata->doctorName}}</option>

                      @endforeach
                      </select>
                      @error('doctorId')
                      <sapn class="text-danger">{{ $message }}</sapn>
                      @enderror
                  </div>
              </div>

              {{-- <select class="form-select form-control-user @error('cityId') is-invalid @enderror"
              name="cityId" value="{{$hospital->cityId}}" style="padding:15px;border:1px solid #D1D3E2;font-size:15px;"
               aria-label="Default select example">
                   @foreach ($city as $citydata)
                      <option value="{{$citydata->id}}" {{$citydata->id == old('cityId',$hospital->cityId) ? 'selected':'' }}>{{$citydata->name}}</option>
                   @endforeach
          </select> --}}


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Day </strong>
                    <input type="date" value="{{$schedule->day}}" name="day" class="form-control @error('day') is-invalid @enderror">
                    @error('day')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Session</strong>
                    <input type="text" value="{{$schedule->session}}" name="session" class="form-control @error('session') is-invalid @enderror">
                    @error('session')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Time</strong>
                    <input type="number" value="{{$schedule->time}}" name="time" class="form-control @error('time') is-invalid @enderror">
                    @error('time')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>

           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btnsubmit">Update</button>
            </div>

        </form>        
    </div>
</div>




@endsection