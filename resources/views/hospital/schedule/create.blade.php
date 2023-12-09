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

        <form id="frm" action="{{route('schedule.store')}}" method="POST">
            @csrf
            <input type="hidden" name="hospitalId" value="{{$hospital->id}}">
            <!--  DR NAME START -->
            <div class="col">
                <div class="form-group">
                    <strong>Doctor Name </strong>
                    <select type="text" name="doctorId" id="doctorId" class="form-control @error('doctorId') is-invalid @enderror">
                        <option selected disabled><strong>Select here... </strong></option>
                        @foreach ($doctor as $doctor)
                        <option value="{{$doctor->id}}">{{$doctor->doctorName}}</option>

                        @endforeach
                    </select>
                    @error('doctorId')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div>
            <!-- DR NAME END -->
            <table>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Day</th>
                            <th scope="col">Session</th>
                            <th scope="col">if available 24x7 click below</th>
                            <th scope="col">Time of Arrival</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Sunday" name="day" id="day">
                                    <label class="form-check-label" for="Sunday">
                                        Sunday
                                    </label>
                                </div>
                            </th>

                            <td>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" value="Before Lunch" name="session" id="session">
                                    <label class="form-check-label" for="Before Lunch">
                                        Before Lunch
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                    <label class="form-check-label" for=" 24 x 7 Available">
                                        24 x 7 Available
                                    </label>
                                </div>
                            </td>
                            <td>
                                <input type="time" name="time" id="time" class="form-control @error('time') is-invalid @enderror">

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Monday" name="day" id="day">
                                    <label class="form-check-label" for="Monday">
                                        Monday
                                    </label>
                                </div>
                            </th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="After Lunch" name="session" id="session">
                                    <label class="form-check-label" for="After Lunch">
                                        After Lunch
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Tuesday" name="day" id="day">
                                    <label class="form-check-label" for="Tuesday">
                                        Tuesday
                                    </label>
                                </div>
                            </th>
                            <td>
                                <div class="form-check">
                                    <input class="for-select form-check-input" type="radio" value="Available Full Day" name="session" id="session">
                                    <label class="form-check-label" for="Available Full Day">
                                        Available Full Day
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Wednesday" name="day" id="day">
                                    <label class="form-check-label" for="Wednesday">
                                        Wednesday
                                    </label>
                                </div>
                            </th>

                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Thursday" name="day" id="day">
                                    <label class="form-check-label" for="Thursday">
                                        Thursday
                                    </label>
                                </div>
                            </th>

                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Friday" name="day" id="day">
                                    <label class="form-check-label" for="Friday">
                                        Friday
                                    </label>
                                </div>
                            </th>

                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Saturday" name="day" id="day">
                                    <label class="form-check-label" for="Saturday">
                                        Saturday
                                    </label>
                                </div>
                            </th>

                        </tr>
                    </tbody>
                </table>
            </table>
            <div class="row">



                <!-- DAY START -->
                <div class="col">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <!-- <input type="text" name="day"  id="day" class="form-control @error('day') is-invalid @enderror"> -->








                                @error('day')
                                <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                </div>
                <!-- DAY END -->


                <!-- SESSION START -->

                <div class="col">
                    <div class="form-group">
                        <!-- <input type="text" name="session" id="session" class="form-control @error('session') is-invalid @enderror"> -->



                        @error('session')
                        <sapn class="text-danger">{{ $message }}</sapn>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">

                        @error('time')
                        <sapn class="text-danger">{{ $message }}</sapn>
                        @enderror
                    </div>
                </div>
                <!-- SESSION END -->


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btnsubmit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    jQuery('#frm').validate({
        rules: {
            hospitalId: "required",
            doctorId: "required",
            day: "required",
            photo: "required",
            session: "required",
            time: "required",
        },
        messages: {
            hospitalId: "Please Select Hospital",
            doctorId: "Please Select Doctor",
            day: "Please Enter day",
            photo: "Please Select Image",
            session: "Please Enter Session",
            time: "Please Enter Time",
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>

<script>
    $(document).ready(function() {
        $("#selectAll").click(function() {
            $(".for-select").attr('checked', this.checked)
        })
    })
</script>
@endsection