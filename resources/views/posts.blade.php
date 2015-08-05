@extends('layout.admin.base')

@section('title', '文章')

@section('content')
    @foreach($posts as $post)
        <dl>
            <dt>{{ $post->title }}</dt>
            <dd>{!! $post->thumb_img !!}</dd>
            <dd>{{ $post->summary }}</dd>
            <dd>
                <a href="{{ url('admin/p/view/'.$post->id) }}">More</a>
                <a href="{{ url('admin/p/edit/'.$post->id) }}">Edit</a>
            </dd>
        </dl>
    @endforeach

    {!! $posts->render() !!}
@endsection