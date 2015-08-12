@extends('layout.admin.base')

@section('title', '管理员')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>邮箱</th><th>昵称</th><th>操作</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <a href="{{ url('admin/u/edit/'.$user->id) }}">编辑</a>
                    <a href="{{ url('admin/u/perm/'.$user->id) }}">权限</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $users->render() !!}

@endsection