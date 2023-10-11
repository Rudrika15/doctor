@extends('layouts.app')
@section('content')

@if(Auth::user()->hasRole('Admin'))
    @include('dashboard.admin')
@elseif(Auth::user()->hasRole('Hospital'))
    @include('dashboard.hospital')
@elseif(Auth::user()->hasRole('Doctor'))
    @include('dashboard.doctor')
@endif
@endsection

    

