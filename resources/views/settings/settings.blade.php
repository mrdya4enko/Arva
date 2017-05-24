@extends('layouts.site')

@section('left_column')
    @include('sidebar.left')
@endsection

@section('middle_column')
    @include('settings.middle')
@endsection

@section('right_column')
    @include('sidebar.right')
@endsection
