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
            <td>{{ $term['id'] }}</td>
            <td>{{ $term['type'] }}</td>
            <td>{{ $term['name'] }}</td>
            <td>{{ str_replace('_','&nbsp;&nbsp;&nbsp;&nbsp;',str_pad('', substr_count($term['ptree'], '-'), '_')).$term['cname'] }}</td>
            <td>
                <a href="{{ url('admin/t/edit/'.$term['id']) }}">编辑</a>
                <a href="{{ url('admin/p/'.$term['id']) }}">查看</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection