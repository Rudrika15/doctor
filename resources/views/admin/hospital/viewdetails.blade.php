@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">{{$hospital->hospitalName}}</h2>
        {{-- <div class="pt-2"><a class="btn addbtn" href="{{ route('hospital.create') }}"> Add Hospital</a></div> --}}
    </div>
    
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <ul class="nav nav-tabs">
            <li class="active"><a href="#doctor" data-toggle="tab">Doctor</a></li>
            <li><a href="#gallery" data-toggle="tab">Gallery</a></li>
            <li><a href="#facility" data-toggle="tab">Facility</a></li>
            <li><a href="#sociallink" data-toggle="tab">Social Link</a></li>
            <li><a href="#leads" data-toggle="tab">Leads</a></li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="doctor">
                    <form  action="" method="get" class="mb-5">
                        <div class="row">
                        <input type="hidden" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror" >
                        
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" autocomplete="off" id="searchInput" onkeyup="filterList()" onfocus="showItems()" name="doctorName" placeholder="Enter Doctor Name"class="form-control @error('doctorName') is-invalid @enderror">
                                @foreach ($doctor as $doctorName)
                                    <div class="item text-center p-2 border" style="display: none;">{{$doctorName->doctorName}}</div>
                                    @endforeach
                                    
                                @error('doctorName')
                                <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                        </div> 
                   
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-select form-control-user @error('specialistId') is-invalid @enderror" name="specialistId" id="specialistId" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;" aria-label="Default select example">
                                    <option selected disabled>---Select Specialist---</option>
                                    @foreach ($doctor as $doctorsspecialist)
                                        <option value={{$doctorsspecialist->specialistId}}>{{$doctorsspecialist->specialist->specialistName}}</option>
                                    @endforeach
                                </select>
                                @error('specialistId')
                                <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-lg-4">
                            <div class="form-group">
                                    <select class="form-select form-control-user @error('status') is-invalid @enderror"
                                        name="status" id="status" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;"
                                         aria-label="Default select example">
                                             <option selected disabled>---Select Status---</option>
                                             <option value="Active">Active</option>
                                             <option value="Delete">Delete</option>
                                             
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        {{$message}}
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a class=" btn btnsubmit" href="{{route('admin.hospital.viewdetails',['id' => request()->route('id')])}}">Clear</a>
                        </div>
                    </div>
                </form>
                  
                <div class="table-responsive">
                    @if ($hospital->status!="Delete")
                        <div class="mb-4 pull-right"><a class="btn addbtn" href="{{route('admin.doctor.create',['id' => request()->route('id')])}}"> Add Doctor</a></div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>Doctor Name</th>
                            <th>Contact No</th>
                            <th>Specialist</th>
                            <th>User</th>
                            <th>Photo</th>
                            <th>Experience</th>
                            <th>Register Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($doctor as $doctors)
                            <tr>
                                <td>{{$doctors->doctorName}}</td>
                                <td>{{$doctors->contactNo}}</td>
                                <td>{{$doctors->specialist->specialistName}}</td>
        
                                <td>{{$doctors->user->name}}</td>
                                
                                <td>
                                    <img src="{{url('doctor')}}/{{$doctors->photo}}" alt="" width="200" height="200">

                                </td>
                                <td>{{$doctors->experience}}</td>
                                <td>{{$doctors->registerNumber}}</td>
                                <td>{{$doctors->status}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('admin.doctor.edit')}}{{$doctors->id}}">Edit</a>
                                    
                                    <a class="btn btn-danger mt-1" onclick="return confirm('Are you sure want to delete?')" href="{{route('admin.doctor.delete')}}{{$doctors->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        @if ($doctorcount==0)
                        <td colspan="10" class="display-3 text-center text-danger">Record Not Found</td>
                    @endif
                    </table>
                    
                    {!! $doctor->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
            </div>
            {{-- Gallery Start --}}
            <div class="tab-pane" id="gallery">
                                                                                               
                <form action="{{ route('admin.hospital.viewdetails',['id' => request()->route('id')]) }}" method="get" class="mb-5">
                        <div class="row">
                        <input type="hidden" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror">
                  
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" autocomplete="off" id="searchGalleryInput" onkeyup="filterGalleryList()" onfocus="showGalleryItems()" name="title" placeholder="Enter title"class="form-control @error('title') is-invalid @enderror">
                                @foreach ($gallery as $title)
                                    <div class="itemGallery text-center p-2 border" style="display: none;">{{$title->title}}</div>
                                    @endforeach
                                    
                                @error('title')
                                <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="form-group">
                                    <select class="form-select form-control-user  @error('status') is-invalid @enderror"
                                        name="status" id="status" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;"
                                         aria-label="Default select example">
                                             <option selected disabled class="text-center">---Select status---</option>
                                             <option value="Active">Active</option> 
                                             <option value="Delete">Delete</option> 
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                        {{$message}}
                                        </span>
                                    @enderror
                            </div>
                        </div> 
                        <div class="col-lg-4 mt-4 text-center">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a class=" btn btnsubmit" href="{{route('admin.hospital.viewdetails',['id' => request()->route('id')])}}">Clear</a>

                        </div>
                     </div>
                    </form>
                
                <div class="table-responsive">
                    <div class="mb-4 pull-right"><a class="btn addbtn" href="{{ route('admin.gallery.create',['id' => request()->route('id')])}}"> Add Gallery</a></div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                        @foreach ($gallery as $gallerys)
                            <tr>
                                <td>{{$gallerys->title}}</td>
                                <td>{{$gallerys->slug}}</td>
                                <td>
                                    <img src="{{url('gallery')}}/{{$gallerys->photo}}" alt="" width="200" height="200">
                                </td>
                                <td>{{$gallerys->status}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('admin.gallery.edit')}}{{$gallerys->id}}">Edit</a>
                                    <a class="btn btn-danger mt-1" onclick="return confirm('Are you sure want to delete?')" href="{{route('admin.gallery.delete')}}{{$gallerys->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        @if ($gallerycount==0)
                            <td colspan="5" class="display-3 text-center text-danger">Record Not Found</td>
                        @endif

                    </table>
                    {!! $gallery->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
                {{-- {!! $data->render() !!} --}}

                
            </div>
            {{-- Gallery End --}}

            {{-- Facility Start --}}
            <div class="tab-pane" id="facility">
                <form class="mb-5" action="{{ route('admin.hospital.viewdetails',['id' => request()->route('id')]) }}" method="get">
                    <div class="row">
                    <input type="hidden" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror">
              
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" autocomplete="off" id="searchFacilityInput" onkeyup="filterFacilityList()" onfocus="showFacilityItems()" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title">
                            @foreach ($facility as $title)
                                <div class="itemFacility text-center p-2 border" style="display: none;">{{$title->title}}</div>
                                @endforeach
                                
                            @error('title')
                            <sapn class="text-danger">{{ $message }}</sapn>
                            @enderror
                        </div>
                </div> 
                   
                <div class="col-lg-4">
                    <div class="form-group">
                            <select class="form-select form-control-user  @error('status') is-invalid @enderror"
                                name="status" id="status" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;"
                                 aria-label="Default select example">
                                     <option selected disabled class="text-center">---Select status---</option>
                                     <option value="Active">Active</option> 
                                     <option value="Delete">Delete</option> 
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                {{$message}}
                                </span>
                            @enderror
                    </div>
                </div>  
                    
                    
                    <div class="col-lg-4 mt-4 text-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a class=" btn btnsubmit" href="{{route('admin.hospital.viewdetails',['id' => request()->route('id')])}}">Clear</a>

                    </div>
                 </div>
                </form>
            
                <div class="table-responsive">
                    <div class="mb-4 pull-right"><a class="btn addbtn" href="{{ route('admin.facility.create',['id' => request()->route('id')]) }}"> Add Facility</a></div>

                    <table class="table table-bordered">
                        <tr>
                            
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                        @foreach ($facility as $facilitys)
                            <tr>
                                <td>{{$facilitys->title}}</td>
                                <td>{{$facilitys->slug}}</td>
                                <td>
                                    <img src="{{url('facility')}}/{{$facilitys->photo}}" alt="" width="200" height="200">
                                </td>
                                <td>{{$facilitys->status}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('admin.facility.edit')}}{{$facilitys->id}}">Edit</a>
                                    <a class="btn btn-danger mt-1" onclick="return confirm('Are you sure want to delete?')" href="{{route('admin.facility.delete')}}{{$facilitys->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        @if ($facilitycount==0)
                            <td colspan="5" class="display-3 text-center text-danger">Record Not Found</td>
                        @endif
                    </table>
                    {!! $facility->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
                {{-- {!! $data->render() !!} --}}
            </div>
            {{-- Facility End --}}

            {{-- Social Link Start --}}
            <div class="tab-pane" id="sociallink">
               
                <form class="mb-5" action="{{ route('admin.hospital.viewdetails',['id' => request()->route('id')]) }}" method="get">
                    <div class="row">
                    <input type="hidden" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror">
              
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" autocomplete="off" id="searchSocialInput" onkeyup="filterSocialList()" onfocus="showSocialItems()" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title">
                            @foreach ($sociallink as $title)
                                <div class="itemSocial text-center p-2 border" style="display: none;">{{$title->title}}</div>
                                @endforeach
                                
                            @error('title')
                            <sapn class="text-danger">{{ $message }}</sapn>
                            @enderror
                        </div>
                </div> 
                   
                <div class="col-lg-4">
                    <div class="form-group">
                            <select class="form-select form-control-user  @error('status') is-invalid @enderror"
                                name="status" id="status" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;"
                                 aria-label="Default select example">
                                     <option selected disabled class="text-center">---Select status---</option>
                                     <option value="Active">Active</option> 
                                     <option value="Delete">Delete</option> 
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                {{$message}}
                                </span>
                            @enderror
                    </div>
                </div>  
                    
                    
                    <div class="col-lg-4 mt-4 text-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a class=" btn btnsubmit" href="{{route('admin.hospital.viewdetails',['id' => request()->route('id')])}}">Clear</a>

                    </div>
                 </div>
                </form>
            
                <div class="table-responsive">
                    <div class="mb-4 pull-right"><a class="btn addbtn" href="{{ route('admin.sociallink.create',['id' => request()->route('id')]) }}"> Add Social Link</a></div>

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                        @foreach ($sociallink as $sociallinks)
                            <tr>
                                <td>{{$sociallinks->title}}</td>
                                <td>{{$sociallinks->slug}}</td>
                                <td>{{$sociallinks->link}}</td>
                                <td>{{$sociallinks->status}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('admin.sociallink.edit')}}{{$sociallinks->id}}">Edit</a>
                                    <a class="btn btn-danger mt-1" onclick="return confirm('Are you sure want to delete?')" href="{{route('admin.sociallink.delete')}}{{$sociallinks->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        @if ($socialcount==0)
                            <td colspan="5" class="display-3 text-center text-danger">Record Not Found</td>
                        @endif
                    </table>
                    {!! $sociallink->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
                {{-- {!! $data->render() !!} --}}
            </div>
            {{-- End Social Link --}}

            {{-- Start Leads --}}
            <div class="tab-pane" id="leads">
               
                <form class="mb-5" action="{{ route('admin.hospital.viewdetails',['id' => request()->route('id')]) }}" method="get">
                    <div class="row">
                    <input type="hidden" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror">
              
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" autocomplete="off" id="searchLeadInput" onkeyup="filterLeadList()" onfocus="showLeadItems()" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                                @foreach ($lead as $name)
                                <div class="itemLead text-center p-2 border" style="display: none;">{{$title->name}}</div>
                                @endforeach
                                
                            @error('name')
                            <sapn class="text-danger">{{ $message }}</sapn>
                            @enderror
                        </div>
                    </div> 
                   
                    <div class="col-lg-4">
                        <div class="form-group">
                                <select class="form-select form-control-user  @error('status') is-invalid @enderror"
                                    name="status" id="status" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;"
                                    aria-label="Default select example">
                                        <option selected disabled class="text-center">---Select status---</option>
                                        <option value="Active">Active</option> 
                                        <option value="Delete">Delete</option> 
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                    {{$message}}
                                    </span>
                                @enderror
                        </div>
                    </div>  
                    
                    
                    <div class="col-lg-4 mt-4 text-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a class=" btn btnsubmit" href="{{route('admin.hospital.viewdetails',['id' => request()->route('id')])}}">Clear</a>

                    </div>
                 </div>
                </form>
            
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Age</th> 
                        </tr>
                        @foreach ($lead as $leads)
                        <tr>
                            <td>{{$leads->name}}</td>   
                            <td>{{$leads->phone}}</td>   
                            <td>{{$leads->age}}</td>   
                        </tr>   
                        @endforeach
                        @if ($leadcount==0)
                            <td colspan="5" class="display-3 text-center text-danger">Record Not Found</td>
                        @endif
                    </table>
                    {!! $lead->withQueryString()->links('pagination::bootstrap-5') !!}

                 </div>
                {{-- {!! $data->render() !!}  --}}
            </div>
            {{-- End Leads --}}
        </div>
 
    </div>
</div>

{{-- For Doctor --}}
<script>
    function showItems() {
       
      var items = document.getElementsByClassName("item");
      for (var i = 0; i < items.length; i++) {
        var item = items[i];
        item.style.display = "";
        
      }
    }
  
    function filterList() {
      var input = document.getElementById("searchInput").value.toLowerCase();
      var items = document.getElementsByClassName("item");
      
      if (input === "") {
        showItems();
      } else {
        for (var i = 0; i < items.length; i++) {
          var item = items[i];
          var text = item.textContent.toLowerCase();
          
          if (text.indexOf(input) > -1) {
            item.style.display = "";
          } else {
            item.style.display = "none";
            
          }
        }
      }
    }
  </script> 
  {{-- ------------------------------------------ --}}

  {{-- For Gallery --}}
  <script>
    function showGalleryItems() {
       
      var itemGallerys = document.getElementsByClassName("itemGallery");
      for (var i = 0; i < itemGallerys.length; i++) {
        var itemGallery = itemGallerys[i];
        itemGallery.style.display = "";
        
      }
    }
  
    function filterGalleryList() {
      var input = document.getElementById("searchGalleryInput").value.toLowerCase();
      var itemGallerys = document.getElementsByClassName("itemGallery");
      
      if (input === "") {
        showitemGallerys();
      } else {
        for (var i = 0; i < itemGallerys.length; i++) {
          var itemGallery = itemGallerys[i];
          var text = itemGallery.textContent.toLowerCase();
          
          if (text.indexOf(input) > -1) {
            itemGallery.style.display = "";
          } else {
            itemGallery.style.display = "none";
            
          }
        }
      }
    }
  </script>
  {{-- ---------------------------------- --}}

  {{-- Fro Facility --}}

  <script>
    function showFacilityItems() {
       
      var itemFacilitys = document.getElementsByClassName("itemFacility");
      for (var i = 0; i < itemFacilitys.length; i++) {
        var itemFacility = itemFacilitys[i];
        itemFacility.style.display = "";
        
      }
    }
  
    function filterFacilityList() {
      var input = document.getElementById("searchFacilityInput").value.toLowerCase();
      var itemFacilitys = document.getElementsByClassName("itemFacility");
      
      if (input === "") {
        showitemFacilitys();
      } else {
        for (var i = 0; i < itemFacilitys.length; i++) {
          var itemFacility = itemFacilitys[i];
          var text = itemFacility.textContent.toLowerCase();
          
          if (text.indexOf(input) > -1) {
            itemFacility.style.display = "";
          } else {
            itemFacility.style.display = "none";
            
          }
        }
      }
    }
  </script>

  {{-- ----------------------------------  --}}

  {{-- For Social Link --}}

  <script>
    function showSocialItems() {
       
      var itemSocials = document.getElementsByClassName("itemSocial");
      for (var i = 0; i < itemSocials.length; i++) {
        var itemSocial = itemSocials[i];
        itemSocial.style.display = "";
        
      }
    }
  
    function filterSocialList() {
      var input = document.getElementById("searchSocialInput").value.toLowerCase();
      var itemSocials = document.getElementsByClassName("itemSocial");
      
      if (input === "") {
        showitemSocials();
      } else {
        for (var i = 0; i < itemSocials.length; i++) {
          var itemSocial = itemSocials[i];
          var text = itemSocial.textContent.toLowerCase();
          
          if (text.indexOf(input) > -1) {
            itemSocial.style.display = "";
          } else {
            itemSocial.style.display = "none";
            
          }
        }
      }
    }
  </script>

  {{-- ----------------------------------- --}}


  {{-- For User Leads --}}

  

  {{-- ----------------------------------- --}}
@endsection
