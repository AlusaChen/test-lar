@extends('layout.base')

@section('title', 'Index')

@section('sidebar')
    @parent
    <li>
        This is appended to the master sidebar.
    </li>
@endsection

@section('content')
    Hello {{ $name }}
    Age {{ $age }}
    <p>This is my body content.</p>
@endsection