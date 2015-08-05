@extends('layout.admin.base')

@section('title', 'Term')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th><th>类型</th><th>Name</th><th>名称</th><th>操作</th>
            </tr>
        </thead>
        <tbody>
        @foreach($terms as $term)
        <tr>
            <td>{{ $term->id }}</td>
            <td>{{ $term->type }}</td>
            <td>{{ $term->name }}</td>
            <td>{{ $term->cname }}</td>
            <td>
                <a href="{{ url('admin/t/edit/'.$term->id) }}">编辑</a>
                <a href="">查看</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {!! $terms->render() !!}
@endsection