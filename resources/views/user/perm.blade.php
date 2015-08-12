@extends('layout.admin.base')

@section('title', '管理员-权限')

@section('content')
    <form action="" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="col-sm-2 control-label">登录邮箱</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" disabled="disabled" value="{{ $user->email }}" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">昵称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" disabled="disabled" value="{{ $user->name }}" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">权限</label>
            <div class="col-sm-6" id="perm-box">

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>

    </form>

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach

@endsection

@section('other_js')
<script type="text/javascript">
$(function(){
    $.get('{{ url('admin/perm') }}', function(data, status){
        if(status == 'success')
        {
            $('#perm-box').html(data);
        }
    });
});
</script>
@endsection