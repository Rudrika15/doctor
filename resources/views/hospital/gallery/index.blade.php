@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">Gallery</h2>
        <div class="pt-2"><a class="btn addbtn" href="{{route('gallery.create')}}"> Add Gallery</a></div>
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
                <th>Photo</th>
                <th>Title</th>
                <th>Status</th>
               
                <th width="280px">Action</th>
            </tr>
            @foreach ($gallery as $galleries)
            <tr>
                <td> <img src="{{url('/gallery')}}/{{$galleries->photo}}" alt="" style="min-height:100px;min-width:100px;max-height:150px;max-width:150px"> </td>
                <td>{{ $galleries->title }}</td>
                <td>{{ $galleries->status }}</td>
                
                {{-- <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif
                </td> --}}
                <td>
                    {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                    <a class="btn btn-success" href="{{route('gallery.edit')}}{{$galleries->id}}">Edit</a> 
                    <a onclick="return confirm('Are you sure want to delete  ?')" class="btn btn-danger" href="{{route('gallery.destroy')}}{{$galleries->id}}">Delete</a>

                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!} --}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
        {!! $gallery->withQueryString()->links('pagination::bootstrap-5') !!}

        {{-- {!! $data->render() !!} --}}
    </div>
</div>




@endsection