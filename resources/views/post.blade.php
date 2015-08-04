@extends('layout.admin.base')

@section('title', '详情页')


@section('content')
    <h1>{{ $post->title }}</h1>
    <div>
        {!! $post->content !!}
    </div>
@endsection