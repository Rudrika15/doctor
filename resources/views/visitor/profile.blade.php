@extends('layouts.visitorApp')
@section('content')
    <main id="main" class="mt-5">
        <section class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1  class="mb-4"><span class="fw-bold" style="color: #2c4964;">Profile</span></h1>
                            <h4 style="color: #2c4964;">Name</h4>
                            <p>{{Auth::user()->name}}</p>
                            <h4 style="color: #2c4964;">Email</h4>
                            <p>{{Auth::user()->email}}</p>
                            <h4 style="color: #2c4964;">Contact No</h4>
                            <p>{{Auth::user()->contactNumber}}</p>     
                        </div>
                        <div class="col-lg-6">
                            <h1 class="mb-4"><span class="fw-bold" style="color: #2c4964;">Update Profile</span></h1>
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="name" class="fw-bold" style="color: #2c4964;">{{_('Name')}}</label>
                                        <input type="text" class="form-control mt-1" name="name" placeholder="Enter Name">
                                    </div>
                                    <div class="col-lg-6" style="color: #2c4964;">
                                        <label for="email" class="fw-bold">{{_('Email')}}</label>
                                        <input type="text" class="form-control mt-1" name="email" placeholder="Enter Email">
                                    </div>
                                    <div class="col-lg-6 mt-3" style="color: #2c4964;">
                                        <label for="age" class="fw-bold">{{_('Age')}}</label>
                                        <input type="text" class="form-control mt-1" name="age" placeholder="Enter Age">
                                    </div>
                                    <div class="col-lg-6 mt-3" style="color: #2c4964;">
                                        <label for="contactNumber" class="fw-bold">{{_('Contact Number')}}</label>
                                        <input type="text" class="form-control mt-2" name="contactNumber" placeholder="Enter Contact Number">
                                    </div>
                                    <div class="col-lg-6 mt-3" style="color: #2c4964;">
                                        <label for="stateId" class="fw-bold">{{_('State')}}</label>
                                        <select class="form-select" id="stateId" name="stateId">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                          </select>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="address" class="fw-bold" style="color: #2c4964;">{{_('Address')}}</label><br>
                                        <textarea name="address" id="address" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="photo" class="fw-bold">{{_('Photo')}}</label>
                                        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                        @error('photo')
                                        <sapn class="text-danger">{{ $message }}</sapn>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="image"></label>
                                        <img src="{{url('gallery/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                                    </div>
                                    <div class="col-lg-12 mt-5 ">
                                        <center class="gx-5">
                                            <button class="btn btn-primary text-white mb-3">Update</button>
                                            <button class="btn btn-primary text-white mb-3">Cancel</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
        </section>
    </main>

    <script>
        function readURL(input, tgt) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector(tgt).setAttribute("src",
                        e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection