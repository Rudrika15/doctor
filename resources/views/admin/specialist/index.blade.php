@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Specialist Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('specialist.create') }}"> Add Specialist</a></div>
    </div>
    <form id="frm" class="mt-5" action="{{route('specialist.index')}}" method="get" >
       
        <div class="col-lg-4">
            <div class="form-group">
                <input type="text" autocomplete="off" id="searchInput" onkeyup="filterList()" onfocus="showItems()" name="specialistName" class="form-control @error('specialistName') is-invalid @enderror" placeholder="Enter Speciaist Name ">
                @foreach ($specialist as $specialistName)
                    <div class="item text-center p-2 border" style="display: none;">{{$specialistName->specialistName}}</div>
                @endforeach
                    
                @error('specialistName')
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
        <div class="col-lg-4 text-center gap-5">
            <button type="submit" class="btn btn-primary">Search</button>
            <a class=" btn btnsubmit" href="{{route('specialist.index')}}">Clear</a>

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
                    <th>Specialist Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($specialist as $specialists)
                <tr>
                    <td>{{$specialists->specialistName}}</td>
                    <td>{{$specialists->slug}}</td>
                    <td>{{$specialists->status}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('specialist.edit')}}{{$specialists->slug}}">Edit</a>
                    
                        <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" href="{{route('specialist.delete')}}{{$specialists->id}}">Delete</a>
                    </td>

                </tr>
                @endforeach

                @if ($count==0)
                    <td colspan="3" class="display-3 text-center text-danger">Record Not Found</td>
                @endif
            </table>
            {!! $specialist->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>

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
{{-- <script>
    function showList() {
      document.getElementById("myUL").style.display = "block";
    }
    
    function myFunction() {
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName("li");
      
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
</script> --}}
@endsection