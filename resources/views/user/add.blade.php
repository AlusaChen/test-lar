@extends('layout.admin.base')

@section('title', '管理员')

@section('content')
<form action="" method="post" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group {{ $errors->get('email') ?'has-error':'' }}">
        <label for="input-email" class="col-sm-2 control-label">登录邮箱</label>
        <div class="col-sm-6">
            <input type="text" name="email" id="input-email" class="form-control" placeholder="登录邮箱" value="{{ Input::old('email') ? : $user->email }}" />
        </div>
        <div class="col-sm-4">
            <label class="control-label" for="input-email">{{ $errors->first('email') }}</label>
        </div>
    </div>

    <div class="form-group {{ $errors->get('name') ?'has-error':'' }}">
        <label for="input-name" class="col-sm-2 control-label">昵称</label>
        <div class="col-sm-6">
            <input type="text" name="name" id="input-name" class="form-control" placeholder="昵称" value="{{ Input::old('name') ? : $user->name }}" />
        </div>
        <div class="col-sm-4">
            <label class="control-label" for="input-name">{{ $errors->first('name') }}</label>
        </div>
    </div>

    <div class="form-group {{ $errors->get('password') ?'has-error':'' }}">
        <label for="input-password" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-6">
            <input type="password" name="password" id="input-password" class="form-control" placeholder="密码" />
        </div>
        <div class="col-sm-4">
            <label class="control-label" for="input-password">{{ $errors->first('password') }}</label>
        </div>
    </div>

    <div class="form-group {{ $errors->get('repassword') ?'has-error':'' }}">
        <label for="input-repassword" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-6">
            <input type="password" name="repassword" id="input-repassword" class="form-control" placeholder="确认密码" />
        </div>
        <div class="col-sm-4">
            <label class="control-label" for="input-repassword">{{ $errors->first('repassword') }}</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">提交</button>
        </div>
    </div>

</form>
@endsection