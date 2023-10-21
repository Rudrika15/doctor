@extends('layouts.app')


@section('content')



<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Blog </h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('blog.create')}}"> Add Blog</a></div>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Detail</th>
                <th>Photo</th>
                <th> Status</th>
                <th>Action</th>
            </tr>

            @foreach ($blog as $blogs)
            <tr>
                <td>{{ $blogs->title }}</td>
                <td>{{ $blogs->slug }}</td>
                <td>{{ $blogs->detail }}</td>
                <td> <img src="{{url('/blog')}}/{{$blogs->photo}}" alt="" style="min-height:100px;min-width:100px;max-height:100px;max-width:100px"> </td>

                <td>{{ $blogs->status }}</td>

                <td>
                    <a class="btn btn-success" href="{{route('blog.edit')}}{{$blogs->id}}">Edit</a> 
                    <a onclick="return confirm('are you sure want to deleted') " class="btn btn-danger" href="{{route('blog.destroy')}}{{$blogs->id}}">Delete</a>
                 
                </td>
            </tr>
            @endforeach
        </table>
        {!! $blog->withQueryString()->links('pagination::bootstrap-5') !!}

        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection