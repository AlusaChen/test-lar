@extends('layout.admin.base')

@section('title', '添加角色')

@section('content')
    <form action="" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $role->id }}">

        <div class="form-group {{ $errors->get('pid') ?'has-error':'' }}">
            <label for="input-pid" class="col-sm-2 control-label">父级</label>
            <div class="col-sm-6">
                <select class="form-control" id="input-pid" name="pid">
                    <option value="0">无</option>
                    @foreach($terms as $item)
                        <option value="{{ $item['id'] }}" {{ ($item['id'] == $role->pid)?'selected':'' }}>{{ str_replace('_','&nbsp;&nbsp;&nbsp;&nbsp;',str_pad('', substr_count($item['ptree'], '-'), '_')).$item['cname'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group {{ $errors->get('name') ? 'has-error' : '' }}">
            <label for="input-name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="input-name" name="name" placeholder="Name" value="{{ Input::old('name') ? : $role->name }}">
            </div>
            <div class="col-sm-4">
                <label class="control-label" for="input-name">{{ $errors->first('name') }}</label>
            </div>
        </div>

        <div class="form-group {{ $errors->get('cname') ? 'has-error':'' }}">
            <label for="input-cname" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="input-name" name="cname" placeholder="名称" value="{{ Input::old('cname') ? : $role->cname }}">
            </div>
            <div class="col-sm-4">
                <label class="control-label" for="input-cname">{{ $errors->first('cname') }}</label>
            </div>
        </div>

        <div class="form-group {{ $errors->get('desc') ? 'has-error':'' }}">
            <label for="input-desc" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-6">
                <textarea class="form-control" id="input-desc" name="desc" rows="3" placeholder="描述">{{ Input::old('desc') ? : $role->desc }}</textarea>
            </div>
            <div class="col-sm-4">
                <label class="control-label" for="input-desc">{{ $errors->first('desc') }}</label>
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
@endsection

@section('other_js')
<script type="text/javascript">
function get_perms(rid, query_rid)
{
    var url = '{{ url('admin/perm/role/') }}'+'/'+rid+'/'+query_rid;
    $.get(url, function(data, status){
        if(status == 'success')
        {
            $('#perm-box').html(data);
        }
    });
}
$(function(){
    var rbox = $('#input-pid');
    var init_rid = parseInt(rbox.val());
    var query_rid = '{{ $role->id }}';
    if(!query_rid) query_rid = 0;
    get_perms(init_rid, query_rid);
    rbox.change(function(){
        var rid = parseInt($(this).val());
        get_perms(rid, query_rid);
    });
});
</script>
@endsection