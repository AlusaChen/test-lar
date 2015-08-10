@extends('layout.admin.base')

@section('title', '管理员')

@section('content')
<form action="" method="post" class="form-horizontal">
    <div class="form-group {{ $errors->get('email') ?'has-error':'' }}">
        <label for="input-email" class="col-sm-2 control-label">登录邮箱</label>
        <div class="col-sm-6">
            <input type="text" name="email" id="input-email" class="form-control" placeholder="email" />
        </div>
        <div class="col-sm-4">
            <label class="control-label" for="input-email">{{ $errors->first('email') }}</label>
        </div>
    </div>
</form>
@endsection