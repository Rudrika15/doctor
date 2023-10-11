@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Education </h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('education.create')}}"> Add Education</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Education</th>
                <th>Status</th>
                
                <th>Action</th>
            </tr>

            @foreach ($education as $educations)
            <tr>
               
                <td>{{ $educations->education }}</td>
              

                <td>{{ $educations->status }}</td>

                <td>
                    <a class="btn btn-success" href="{{route('education.edit')}}{{$educations->id}}">Edit</a> 
                    <a class="btn btn-danger" onclick="return confirm('are you sure want to deleted') " href="{{route('education.destroy')}}{{$educations->id}}">Delete</a>
                 
                </td>
            </tr>
            @endforeach
        </table>
        {!! $education->withQueryString()->links('pagination::bootstrap-5') !!}

        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection