
<div class="continer mt-5">
    <div class="row pt-3">
        <div class="col-md-3">
                <a href="{{route('doctor.index')}}">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body" style="color:#0CA798;">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h1>Doctor</h1>
                            </div>
                            <div class="col-4 dashboard-icon-rounded text-center">
                                <h1 class="fw-bold text-white  fs-1">{{$doctorcount}}</h1>
                            </div>
                        </div> 
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{route('hospital.lead.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Leads</h1>
                        </div>
                        <div class="col-4 dashboard-icon-rounded text-center">
                            <h1 class="fw-bold text-white  fs-1">{{$leadcount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
        </a>
    </div> 
        <div class="col-md-3">
            <a href="{{route('gallery.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Gallery</h1>
                        </div>
                        <div class="col-4 dashboard-icon-rounded text-center">
                            <h1 class="fw-bold text-white  fs-1">{{$gallerycount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
       <div class="col-md-3">
            <a href="{{route('facility.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Facility</h1>
                        </div>
                        <div class="col-4 dashboard-icon-rounded text-center"">
                            <h1 class="fw-bold text-white  fs-1">{{$facilitycount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Social Link</h1>
                        </div>
                        <div class="col-4 dashboard-icon-rounded text-center">
                            <h1 class="fw-bold text-white  fs-1">{{$socialLinkcount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Appoinments</h1>
                        </div>
                        <div class="col-4 dashboard-icon-rounded text-center">
                            <h1 class="fw-bold text-white  fs-1">{{$appointmentcount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
        
    </div>
</div>