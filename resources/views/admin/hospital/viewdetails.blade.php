@extends('layouts.app')
@section('content')
    <div class="card">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Home</a></li>
            <li><a href="#tab2" data-toggle="tab">About</a></li>
            <li><a href="#tab3" data-toggle="tab">Contact</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                Home
            </div>
            <div class="tab-pane" id="tab2">
                About
            </div>
            <div class="tab-pane" id="tab3">
                Contact
            </div>
        </div>

    </div>
@endsection
