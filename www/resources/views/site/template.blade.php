@extends('lib/admin_layout')

@section('header_nav')
    @include('lib.header_nav')
@stop
@section('sidebar')
    @include('lib.sidebar')
@stop
@section('admin_content')
    @include('site/dashboard')
@endsection()
