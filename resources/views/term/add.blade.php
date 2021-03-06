@extends('layout.admin.base')

@section('title', '添加Term')

@section('content')
    <form action="{{ url('admin/t/add') }}" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="type" value="{{ $term->type }}">
        <input type="hidden" name="id" value="{{ $term->id }}">

        <div class="form-group {{ $errors->get('pid') ?'has-error':'' }}">
            <label for="input-pid" class="col-sm-2 control-label">父级</label>
            <div class="col-sm-6">
                <select class="form-control" id="input-pid" name="pid">
                    <option>无</option>
                    @foreach($terms as $item)
                        <option value="{{ $item['id'] }}" {{ ($item['id'] == $term->pid)?'selected':'' }}>{{ str_replace('_','&nbsp;&nbsp;&nbsp;&nbsp;',str_pad('', substr_count($item['ptree'], '-'), '_')).$item['cname'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label class="control-label" for="input-pid">{{ $errors->first('pid') }}</label>
            </div>
        </div>

        <div class="form-group {{ $errors->get('name') ? 'has-error' : '' }}">
            <label for="input-name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="input-name" name="name" placeholder="Name" value="{{ Input::old('name') ? : $term->name }}">
            </div>
            <div class="col-sm-4">
                <label class="control-label" for="input-name">{{ $errors->first('name') }}</label>
            </div>
        </div>
        <div class="form-group {{ $errors->get('cname') ? 'has-error':'' }}">
            <label for="input-cname" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="input-name" name="cname" placeholder="名称" value="{{ Input::old('cname') ? : $term->cname }}">
            </div>
            <div class="col-sm-4">
                <label class="control-label" for="input-cname">{{ $errors->first('cname') }}</label>
            </div>
        </div>
        <div class="form-group {{ $errors->get('desc') ? 'has-error':'' }}">
            <label for="input-desc" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-6">
                <textarea class="form-control" id="input-desc" name="desc" rows="3" placeholder="描述">{{ Input::old('desc') ? : $term->desc }}</textarea>
            </div>
            <div class="col-sm-4">
                <label class="control-label" for="input-desc">{{ $errors->first('desc') }}</label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@endsection