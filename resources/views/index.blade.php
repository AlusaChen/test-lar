@extends('layout.base')

@section('title', 'Index')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    Hello {{ $name }}
    Age {{ $age }}
    <p>This is my body content.</p>
@endsection