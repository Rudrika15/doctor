@extends('layouts.visitorApp')
@section('content')
    <main id="main" class="mt-5">
        <section class="breadcrumbs">
                <div class="container">
                    <h1><span class="fw-bold" style="color: #2c4964;">Profile</span></h1>
                    <div class="mt-5">
                        <h4 style="color: #2c4964;">Name</h4>
                        <p>{{Auth::user()->name}}</p>
                        <h4 style="color: #2c4964;">Email</h4>
                        <p>{{Auth::user()->email}}</p>
                        <h4 style="color: #2c4964;">Contact No</h4>
                        <p>{{Auth::user()->contactNumber}}</p>
                        
                    </div>
                </div>
        </section>
    </main>
@endsection