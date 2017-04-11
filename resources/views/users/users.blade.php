@extends('layouts.site')

@section('left_column')
    @include('home.content_left_column_home')
@endsection

@section('middle_column')
    @include('users.content_middle_column_users')
@endsection

@section('right_column')
    @include('home.content_right_column_home')
@endsection
