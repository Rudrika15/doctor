
@extends('layouts.app')
@section('content')

<div class="card" style="">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Leads</h2>
    </div>
  
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
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

                {{-- @if ($count==0)
                    <td colspan="3" class="display-3 text-center text-danger">Record Not Found</td>
                @endif --}}
            </table>
            {!! $lead->withQueryString()->links('pagination::bootstrap-5') !!}
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

