@section('sidebar')
    <li><a href="{{ url('admin/') }}">首页</a> </li>
    <li><a href="#">文章</a> </li>
    <ul>
        <li><a href="{{ url('admin/p/') }}">列表</a> </li>
        <li><a href="{{ url('admin/p/add') }}">发布</a> </li>
    </ul>
    <li><a href="#">分类</a> </li>
    <ul>
        <li><a href="{{ url('admin/t/category') }}">列表</a> </li>
        <li><a href="{{ url('admin/t/add/category') }}">添加</a> </li>
    </ul>
    <li><a href="#">标签</a> </li>
    <ul>
        <li><a href="{{ url('admin/t/tag') }}">列表</a> </li>
        <li><a href="{{ url('admin/t/add/tag') }}">添加</a> </li>
    </ul>
    <li><a href="#">权限</a> </li>
    <ul>
        <li><a href="{{ url('admin/t/permission') }}">列表</a> </li>
        <li><a href="{{ url('admin/t/add/permission') }}">添加</a> </li>
    </ul>

    <li><a href="#">角色</a> </li>
    <ul>
        <li><a href="{{ url('admin/r/') }}">列表</a> </li>
        <li><a href="{{ url('admin/r/add') }}">添加</a> </li>
    </ul>


    <li><a href="#">管理员</a> </li>
    <ul>
        <li><a href="{{ url('admin/u/') }}">列表</a> </li>
        <li><a href="{{ url('admin/u/add') }}">添加</a> </li>
    </ul>
@endsection