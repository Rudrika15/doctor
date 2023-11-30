<div class="continer mt-5">
    <div class="row pt-3">
        <div class="col-md-3">
            <a href="{{route('admin.slider.index')}}">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body" style="color:#0CA798;">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h1>Slider</h1>
                            </div>
                            <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                                <h1 class="fw-bold text-white pt-3">{{$slidercount}}</h1>
                            </div>
                        </div> 
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('hospital.index',[])}}">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body" style="color:#0CA798;">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h1>Hospital</h1>
                            </div>
                            <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                                <h1 class="fw-bold text-white pt-3">{{$hospitalcount}}</h1>
                            </div>
                        </div> 
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
                <a href="{{route('hospital.index')}}">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body" style="color:#0CA798;">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h1>Doctor</h1>
                            </div>
                            <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;"">
                                <h1 class="fw-bold text-white pt-3">{{$doctorcount}}</h1>
                            </div>
                        </div> 
                    </div>
                </div>
            </a>
        </div> 
        <div class="col-md-3">
            <a href="{{route('specialist.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Specialist</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$specialistcount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('hospitaltype.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Hospital Type</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$hospitalTypecount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div> 
        <div class="col-md-3">
            <a href="{{route('hospital.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Leads</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$leadcount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('hospital.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Category</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$categorycount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div> 
        <div class="col-md-3">
            <a href="{{route('city.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>City</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$citycount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div> 
        <div class="col-md-3">
            <a href="{{route('state.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>State</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$statecount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('hospital.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Gallery</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$gallerycount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('hospital.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Facility</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$facilitycount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('hospital.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Social Link</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$socialLinkcount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('users.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>User</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;"">
                            <h1 class="fw-bold text-white pt-3">{{$usercount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div> 
        <div class="col-md-3">
            <a href="{{route('roles.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Role</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;"">
                            <h1 class="fw-bold text-white pt-3">{{$rolecount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div> 
    </div>
</div>