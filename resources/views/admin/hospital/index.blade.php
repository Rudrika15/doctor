@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Hospital Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('hospital.create') }}"> Add Hospital</a></div>
    </div>
    <form class="mt-5 ms-5 me-5" action="{{route('hospital.index')}}" method="get">
        <div class="row">

            <div class="col-lg-4">
                <div class="form-group">
                    <select  name="hospitalName" class="search-dropdown form-control @error('hospitalName') is-invalid @enderror" placeholder="Enter Hospital Name">
                   <option selected disabled>--Select HospitalName--</option>
                    @foreach ($hospital as $hspitalsearch)
                        <option class="item text-center p-2 border" style="display: none;">{{$hspitalsearch->hospitalName}}</option>
                    @endforeach
                    </select>
                    @error('hospitalName')
                    <sapn class="text-danger">{{ $message }}</sapn>
                    @enderror
                </div>
            </div> 
            
            <div class="col-lg-4">
                <div class="form-group">

                    <select class="form-select search-dropdown form-control-user @error('cityId') is-invalid @enderror" name="cityId" id="cityId" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;" aria-label="Default select example">
                        <option selected disabled>---Select City---</option>
                        @foreach ($city as $city)
                        <option value={{$city->id}}>{{$city->name}}</option>
                        @endforeach
                    </select>
                    @error('cityId')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">

                    <select class="form-select search-dropdown form-control-user @error('hospitalTypeId') is-invalid @enderror" name="hospitalTypeId" id="hospitalTypeId" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;" aria-label="Default select example">
                        <option selected disabled>---Select Hospital Type---</option>
                        @foreach ($hospitaltype as $hospitaltype)
                        <option value={{$hospitaltype->id}}>{{$hospitaltype->typeName}}</option>
                        @endforeach
                    </select>
                    @error('hospitalTypeId')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">

                    <select class="form-select search-dropdown form-control-user @error('category') is-invalid @enderror" name="category" id="category" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;" aria-label="Default select example">
                        <option selected disabled>---Select Category---</option>
                        <option value="Alopethi">Alopethi</option>
                        <option value="Homiopethi">Homiopethi</option>
                        <option value="Aayurvedi">Aayurvedi</option>

                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <select class="form-select search-dropdown form-control-user @error('status') is-invalid @enderror" name="status" id="status" style="padding:11px;border:1px solid #D1D3E2;font-size:15px;" aria-label="Default select example">
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
                <a class=" btn btnsubmit" href="{{route('hospital.index')}}">Clear</a>
            </div>

        </div>
    </form>

    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>


                    <th>Hospital Name</th>
                    <th>Slug</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Contact No</th>
                    <th>Hospital Type</th>
                    <th>User</th>
                    <th>Site Url</th>
                    <th>Category</th>
                    <th>Hospital Logo</th>
                    <th>Time</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                @foreach ($hospital as $hospitals)
                
                <tr>
                    <td>{{$hospitals->hospitalName}}</td>
                    <td>{{$hospitals->slug}}</td>
                    <td>{{$hospitals->address}}</td>

                    <td>{{$hospitals->city->name}}</td>

                    <td>{{$hospitals->contactNo}}</td>

                    <td>{{$hospitals->hospitaltype->typeName}}</td>


                    <td>{{$hospitals->user->name}}</td>


                    <td>{{$hospitals->siteUrl}}</td>
                    <td>{{$hospitals->category->categoryName}}</td>
                    <td><img src="{{url('/hospital')}}/{{$hospitals->hospitalLogo}}"></td>


                    <td>{{$hospitals->hospitalTime}}</td>
                    <td>{{$hospitals->services}}</td>
                    <td>{{$hospitals->status}}</td>

                    <td>
                        <a class="btn btn-success mt-1" href="{{route('admin.hospital.viewdetails')}}{{$hospitals->id}}">View Details</a>

                        <a class="btn btn-primary mt-2" href="{{route('hospital.edit')}}{{$hospitals->id}}">Edit</a>

                        <a class="btn btn-danger mt-2" onclick="return confirm('Are you sure want to delete?')" href="{{route('hospital.delete')}}{{$hospitals->id}}">Delete</a>
                    </td>
                </tr>
                
                @endforeach

                @if ($count==0)
                 <td colspan="13" class="display-3 text-center text-danger">Record Not Found</td>
                @endif
            
            </table>
            {!! $hospital->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>
<!-- <script>
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
  </script> -->

@endsection