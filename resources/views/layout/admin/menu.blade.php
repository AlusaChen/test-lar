@section('sidebar')
    <li><a href="{{ url('admin/') }}">首页</a> </li>
    <li><a href="{{ url('admin/p/') }}">文章</a> </li>
    <li><a href="{{ url('admin/p/add') }}">发布</a> </li>
    <li><a href="{{ url('admin/u') }}">管理员</a> </li>
@endsection