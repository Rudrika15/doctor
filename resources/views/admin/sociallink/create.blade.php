@extends('layouts.app')
@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Social Link Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('admin.hospital.viewdetails',['id'=> request()->route('id')])}}"> Back</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form id="frm" action="{{route('admin.sociallink.store')}}" method="POST">
            @csrf
            <input type="hidden" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <select name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                        <option disabled selected>--Select title--</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Twitter">Twitter</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Website">Website</option>
                        <option value="LinkedIn">LinkedIn</option>
                    </select>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Link:</strong>
                    <input type="text" id="link" name="link" class="form-control @error('link') is-invalid @enderror">
                    @error('link')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btnsubmit">Submit</button>
            </div>

        </form>


    </div>
</div>

{{-- Jquery Validation --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    jQuery('#frm').validate({
        rules: {
            title: {
                required: true,
            },
            link: {
                required: true,
                minlength: 5,
            },
            hospitalId: {
                required: true,
            }

        },
        messages: {
            title: {
                required: "Please Enter Name",
            },
            link: {
                required: "Please Enter Name",
                minlength: "Title Minimum of 5 Character Long"
            },
            hospitalId: {
                required: "Please Select Hospital"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>

@endsection