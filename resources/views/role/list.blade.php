@extends('layout.admin.base')

@section('title', '角色')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th><th>Name</th><th>名称</th><th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role['id'] }}</td>
                <td>{{ $role['name'] }}</td>
                <td>{{ str_replace('_','&nbsp;&nbsp;&nbsp;&nbsp;',str_pad('', substr_count($role['ptree'], '-'), '_')).$role['cname'] }}</td>
                <td>
                    <a href="{{ url('admin/r/edit/'.$role['id']) }}">编辑</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection