@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between ">
        <h2 class="p-3">View Testimonials</h2>
        
        <div class="pt-2"><a class="btn addbtn" href="{{ route('admin.testimonial.create') }}">Add Testimonial</a></div>
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
                    <th>Sub Title</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
                @foreach ($testimonial as $testimonials)
                    <tr>
                       
                        <td>{{$testimonials->title}}</td>
                        <td>{{$testimonials->subTitle}}</td>
                        <td>{{$testimonials->details}}</td>
                        <td>{{$testimonials->status}}</td>
                        <td>
                            <a href="{{route('admin.testimonial.edit')}}/{{$testimonials->id}}" class="btn btn-primary mt-1">Edit</a>
                            <a  href="{{route('admin.testimonial.delete')}}{{$testimonials->id}}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger mt-1">Delete</a>
                        </td>  
                    </tr>
                @endforeach
            </table>
            {!! $testimonial->withQueryString()->links('pagination::bootstrap-5') !!}
         </div>
        {{-- {!! $data->render() !!} --}}
    </div>
</div>

@endsection