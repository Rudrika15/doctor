
@extends('layouts.app')
@section('content')

<div class="card" style="">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Social Link Management</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{ route('admin.sociallink.create') }}"> Add sociallink</a></div>
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
                    <th>Title</th>
                    <th>Link</th>
                    <th>Hospital</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($sociallink as $sociallink)
                <tr>
                    <td>{{$sociallink->title}}</td>
                    <td>{{$sociallink->link}}</td>
                    <td>{{$sociallink->hospitalId}}</td>
                    <td>{{$sociallink->status}}</td>
                    <td>
                        <a class="btn btn-primary" href="">Edit</a>
                    
                        <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" href="">Delete</a>
                    </td>

                </tr>
                @endforeach

                {{-- @if ($count==0)
                    <td colspan="3" class="display-3 text-center text-danger">No data found</td>
                @endif --}}
            </table>
            {{-- {!! $city->withQueryString()->links('pagination::bootstrap-5') !!} --}}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>

<script>
    function showList() {
      document.getElementById("myUL").style.display = "block";
    }
    
    function myFunction() {
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName("li");
      
      for (i = 0; i <script li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
    function showList() {
      document.getElementById("myUL").style.display = "block";
    }
</script>
@endsection

