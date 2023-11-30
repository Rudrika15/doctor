
@extends('layouts.app')
@section('content')

<div class="card" style="">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">State Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('state.create') }}"> Add State</a></div>
    </div>
    <form id="frm" class="mt-5" action="{{route('state.index')}}" method="get" >
    
        <div class="col-lg-4">
                <div class="form-group">
                    <input type="text" autocomplete="off" id="searchInput" onkeyup="filterList()" onfocus="showItems()" name="stateName" class="form-control @error('stateName') is-invalid @enderror" placeholder="Enter State Name">
                        @foreach ($state as $stateName)
                        <div class="item text-center p-2 border" style="display: none;">{{$stateName->name}}</div>
                        @endforeach
                        
                    @error('stateName')
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
            <a class=" btn btnsubmit" href="{{route('state.index')}}">Clear</a>
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
                    <th>State Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($state as $states)
                <tr>
                    <td>{{$states->stateName}}</td>
                    <td>{{$states->slug}}</td>
                    <td>{{$states->status}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('state.edit')}}{{$states->slug}}">Edit</a>
                    
                        <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" href="{{route('state.delete')}}{{$states->id}}">Delete</a>
                    </td>

                </tr>
                @endforeach

                @if ($count==0)
                    <td colspan="3" class="display-3 text-center text-danger">Record Not Found</td>
                @endif 
            </table> 
            {!! $state->withQueryString()->links('pagination::bootstrap-5') !!}
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

@endsection

