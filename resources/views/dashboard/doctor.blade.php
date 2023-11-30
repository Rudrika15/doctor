
<div class="continer mt-5">
    <div class="row pt-3">
        <div class="col-md-3">
                <a href="{{route('blog.index')}}">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body" style="color:#0CA798;">
                        <div class="row">
                            <div class="col-8 mt-3">
                                <h1>Blog</h1>
                            </div>
                            <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                                <h1 class="fw-bold text-white pt-3">{{$blogcount}}</h1>
                            </div>
                        </div> 
                    </div>
                </div>
            </a>
        </div> 
        <div class="col-md-3">
            <a href="{{route('education.index')}}">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body" style="color:#0CA798;">
                    <div class="row">
                        <div class="col-8 mt-3">
                            <h1>Education</h1>
                        </div>
                        <div class="col-4 p-3 rounded-circle text-center" style="background-color:#0CA798;">
                            <h1 class="fw-bold text-white pt-3">{{$educationcount}}</h1>
                        </div>
                    </div> 
                </div>
            </div>
            </a>
        </div>
    </div>
</div>