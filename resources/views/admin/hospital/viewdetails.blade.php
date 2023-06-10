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

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="doctor">
                    <form  action="" method="get" class="mb-5">
                        <div class="row">
                        <input type="hidden" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror" >
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" list="magicHouses" name="doctorName" id="doctorName" placeholder="Enter Doctor Name"class="form-control @error('doctorName') is-invalid @enderror">
                                <datalist id="magicHouses">
                                    @foreach ($doctor as $doctorName)
                                        <option value={{$doctorName->doctorName}}>
                                    @endforeach
                                    
                                </datalist>
                                @error('doctorName')
                                    <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" list="magicHousess1" name="specialistId" id="specialistId" placeholder="Enter Specialist Name" class="form-control @error('specialistId') is-invalid @enderror">
                                <datalist id="magicHousess1">
                                    {{-- <td>{{$doctors->specialist->specialistId}}</td> --}}
                                    @foreach ($doctor as $specialist)
                                        <option value={{$specialist->specialistName}}>
                                    @endforeach
                                    
                                </datalist>
                                @error('specialistName')
                                    <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-lg-4">
                            <div class="form-group">
                                    <select class="form-select form-control-user @error('specialistId') is-invalid @enderror"
                                        name="specialistId" id="specialistId" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;"
                                         aria-label="Default select example">
                                             <option selected disabled>---Select Specialist---</option>
                                             @foreach ($specialist as $specialist)
                                                <option value={{$specialist->id}}>{{$specialist->specialistName}}</option>
                                             @endforeach
                                             
                                    </select>
                                    @error('specialistId')
                                        <span class="invalid-feedback" role="alert">
                                        {{$message}}
                                        </span>
                                    @enderror
                            </div>
                        </div> --}}
                        
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
                    <div class="mb-4 pull-right"><a class="btn addbtn" href="{{route('admin.doctor.create',['id' => request()->route('id')])}}"> Add Doctor</a></div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Hospital</th>
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
                                 <td>{{$doctors->hospital->hospitalName}}</td>
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
                    </table>
                    
                    {!! $doctor->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
            </div>
            <div class="tab-pane" id="gallery">
                                                                                               
                <form action="{{ route('admin.hospital.viewdetails',['id' => request()->route('id')]) }}" method="get" class="mb-5">
                        <div class="row">
                        <input type="hidden" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror">
                  
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" list="magicMouses" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title">
                                <datalist id="magicMouses">
                                    @foreach ($gallery as $title)
                                        <option value={{$title->title}}>
                                    @endforeach
                                </datalist>
                                @error('title')
                                    <sapn class="text-danger">{{ $message }}</sapn>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" list="magicHouses3" id="status" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Enter Status">
                                <datalist id="magicHouses">
                                    @foreach ($gallery as $status)
                                        <option value={{$status->status}}>
                                    @endforeach
                                </datalist>
                                @error('place')
                                <sapn class="text-danger">{{ $message }}</sapn>
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
                            <th>Hospital</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                        @foreach ($gallery as $gallerys)
                            <tr>
                                <td>{{$gallerys->hospital->hospitalName}}</td>
                                <td>{{$gallerys->title}}</td>
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
                            <td colspan="5" class="display-3 text-center text-danger">No data found</td>
                        @endif

                    </table>
                    {!! $gallery->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
                {{-- {!! $data->render() !!} --}}
            </div>
            <div class="tab-pane" id="facility">
                <form class="mb-5" action="{{ route('admin.hospital.viewdetails',['id' => request()->route('id')]) }}" method="get">
                    <div class="row">
                    <input type="hidden" name="hospitalId" value="{{ request()->route('id') }}" class="form-control @error('doctorName') is-invalid @enderror">
              
                    <div class="col-lg-4">
                        <div class="form-group">
                           
                            <input type="text" list="magicMouses3" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Facility Title">
                            <datalist id="magicMouses3">
                                @foreach ($facility as $title)
                                    <option value={{$title->title}}>
                                @endforeach
                            </datalist>
                            @error('title')
                                <sapn class="text-danger">{{ $message }}</sapn>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" list="magicHouses4" id="status" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Enter Status">
                            <datalist id="magicHouses4">
                                @foreach ($facility as $status)
                                    <option value={{$status->status}}>
                                @endforeach
                            </datalist>
                            @error('place')
                            <sapn class="text-danger">{{ $message }}</sapn>
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
                            <th>Hospital</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                        @foreach ($facility as $facilitys)
                            <tr>
                                <td>{{$facilitys->hospital->hospitalName}}</td>
                                <td>{{$facilitys->title}}</td>
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
                            <td colspan="5" class="display-3 text-center text-danger">No data found</td>
                        @endif
                    </table>
                    {!! $facility->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
                {{-- {!! $data->render() !!} --}}
            </div>

            <div class="tab-pane" id="sociallink">
               
                <div class="table-responsive">
                    <div class="mb-4 pull-right"><a class="btn addbtn" href="{{ route('admin.sociallink.create',['id' => request()->route('id')]) }}"> Add Social Link</a></div>

                    <table class="table table-bordered">
                        <tr>
                            <th>Hospital</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>  
                        </tr>
                        @foreach ($sociallink as $sociallinks)
                            <tr>
                                <td>{{$sociallinks->hospital->hospitalName}}</td>
                                <td>{{$sociallinks->title}}</td>
                                <td>{{$sociallinks->link}}</td>
                                <td>{{$sociallinks->status}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('admin.sociallink.edit')}}{{$sociallinks->id}}">Edit</a>
                                    <a class="btn btn-danger mt-1" onclick="return confirm('Are you sure want to delete?')" href="{{route('admin.sociallink.delete')}}{{$sociallinks->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        {{-- @if ($facilitycount==0)
                            <td colspan="5" class="display-3 text-center text-danger">No data found</td>
                        @endif --}}
                    </table>
                    {!! $sociallink->withQueryString()->links('pagination::bootstrap-5') !!}
                 </div>
                {{-- {!! $data->render() !!} --}}
            </div>
        </div>
 
    </div>
</div>

  
@endsection
