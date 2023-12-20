@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3"> {{$doctor->doctorName}}'s Schedule</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('doctor.index')}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="form" action="{{route('schedule.store')}}" method="POST">
            @csrf
            <input type="hidden" name="hospitalId" value="{{Auth::user()->id}}">
            <input type="hidden" name="doctorId" value="{{$doctor->id}}">

            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-active">
                        <th scope="col"></th>
                        <th scope="col" colspan="2" style="text-align: center;">Before Lunch</th>
                        <th scope="col" colspan="2" style="text-align: center;">After Lunch</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    <tr class="table-active">
                        <th scope="col">Day</th>
                        <th scope="col">In Time</th>
                        <th scope="col">Out Time</th>
                        <th scope="col">In Time</th>
                        <th scope="col">Out Time</th>
                        <th scope="col">Holiday</th>
                        <th scope="col">Copy</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($schedule as $scheduleData) 
                    <tr>
                        <th scope="row">{{$scheduleData->day}} </th>

                        <td>
                            <input type="time" name="beforeLunchInTime{{$scheduleData->day}}" id="BeforeInTime" value="{{ $scheduleData->beforeLunchInTime}}" class="form-control @error('beforeLunchInTimeSunday') is-invalid @enderror">
                        </td>
                        <td>
                            <input type="time" name="beforeLunchOutTime{{$scheduleData->day}}" id="BeforeOutTime" value="{{$scheduleData->beforeLunchOutTime}}" class="form-control @error('time') is-invalid @enderror">
                        </td>
                        <td>
                            <input type="time" name="afterLunchInTime{{$scheduleData->day}}" id="AfterInTime" value="{{$scheduleData->afterLunchInTime}}" class="form-control @error('time') is-invalid @enderror">
                        </td>
                        <td>
                            <input type="time" name="afterLunchOutTime{{$scheduleData->day}}" id="AfterOutTime" value="{{$scheduleData->afterLunchOutTime}}" class="form-control @error('time') is-invalid @enderror">
                        </td>
                        <td style="text-align: center;">
                            @if($scheduleData->holiday == 'Yes')
                            <input class="form-check-input" name="holiday{{$scheduleData->day}}" type="checkbox" checked value="Yes" id="checked-disabled">
                            @else
                            <input class="form-check-input" name="holiday{{$scheduleData->day}}" type="checkbox" value="No" id="flexCheckDefault">
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <i class="fa-solid fa-clone copyfn fs-1"></i>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btnsubmit">Submit</button>
            </div>
        </form>
    </div>

</div>
</div>
<!-- for disable row jquery -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    jQuery('#form').validate({
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
<!-- FOR COPYING THE ROW AND PASTING IT IN SUCCEEDING ROW -->
<script>
    $(".copyfn").click(function() {
        var currentRow = $(this).closest('tr');
        var nextRow = currentRow.next('tr');

        if (nextRow.length === 0) {
            // If there is no succeeding row, create one
            nextRow = currentRow.clone();
            currentRow.after(nextRow);
        } else {
            // Find input fields in the current and next rows
            var currentInputs = currentRow.find('input[type="time"]');
            var nextInputs = nextRow.find('input[type="time"]');

            // Copy input values from the current row to the next row
            currentInputs.each(function(index) {
                nextInputs.eq(index).val($(this).val());
            });
        }
    });
</script>

<!-- FOR DISABLING CURRENT ROW ADD TIME FIELD -->
<script>
    //     // FOR ALREADY CHECKED CHECKBOX DISABLE TIME FIELD
    //         var checkDisabled = $("#checked-disabled").is(':checked');
    //    $('#checked-disabled').find('input[type="time"]').prop("disabled", checkDisabled);

    // IF CHECKED CHECKBOX DISABLE TIME FIELD
    $(":checkbox").on("change", function() {
        var check = $(this).is(':checked');
        $(this).closest('tr').find('input[type="time"]').prop("disabled", check);
    });
</script>
<!-- <script>
    $(document).ready(function() {
        $("#selectAll").click(function() {
            $(".for-select").attr('checked', this.checked)
        })
    })
</script> -->
@endsection
<!-- <th scope="col">if available 24x7 click below</th> -->
<!-- <th scope="col">Time of Arrival</th> -->
<!-- SESSION START -->

<!-- <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Sunday" name="day" id="day">
                                    <label class="form-check-label" for="Sunday">
                                        Sunday
                                    </label>
                                </div> -->
<!-- <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Monday" name="day" id="day">
                                    <label class="form-check-label" for="Monday">
                                        Monday
                                    </label>
                                </div> -->
<!-- <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Tuesday" name="day" id="day">
                                    <label class="form-check-label" for="Tuesday">
                                        Tuesday
                                    </label>
                                </div> -->
<!-- <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Wednesday" name="day" id="day">
                                    <label class="form-check-label" for="Wednesday">
                                        Wednesday
                                    </label>
                                </div> -->
<!-- <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Thursday" name="day" id="day">
                                    <label class="form-check-label" for="Thursday">
                                        Thursday
                                    </label>
                                </div> -->

<!-- <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Friday" name="day" id="day">
                                    <label class="form-check-label" for="Friday">
                                        Friday
                                    </label>
                                </div> -->

<!-- <div class="form-check">
                                    <input class="for-select" type="checkbox" value="Saturday" name="day" id="day">
                                    <label class="form-check-label" for="Saturday">
                                        Saturday
                                    </label>
                                </div> -->
<!-- SESSION END -->

<!-- <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" value="Before Lunch" name="session" id="session">
                                    <label class="form-check-label" for="Before Lunch">
                                        Before Lunch
                                    </label>
                                </div> -->
<!-- <div class="form-check">
                                    <input class="form-check-input" type="radio" value="After Lunch" name="session" id="session">
                                    <label class="form-check-label" for="After Lunch">
                                        After Lunch
                                    </label>
                                </div> -->
<!-- <div class="form-check">
                                    <input class="for-select form-check-input" type="radio" value="Available Full Day" name="session" id="session">
                                    <label class="form-check-label" for="Available Full Day">
                                        Available Full Day
                                    </label>
                                </div> -->
<!-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                    <label class="form-check-label" for=" 24 x 7 Available">
                                        24 x 7 Available
                                    </label>
                                </div> -->
<!-- DAY START -->
<!-- <input type="text" name="day"  id="day" class="form-control @error('day') is-invalid @enderror"> -->

<!-- DAY END -->
<!-- <input type="text" name="session" id="session" class="form-control @error('session') is-invalid @enderror"> -->
<!-- ERROR MESSAGES -->
<!-- @error('time')
                        <sapn class="text-danger">{{ $message }}</sapn>
                        @enderror -->
<!-- @error('day')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror -->
<!-- @error('session')
                        <sapn class="text-danger">{{ $message }}</sapn>
                        @enderror -->