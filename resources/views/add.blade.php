@extends('layout.admin.base')

@section('title', '发布')

@section('content')
    <form action="{{ url('admin/p/add') }}" method="post" class="form-horizontal" name="upfile">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="form-group {{ $errors->get('title') ?'has-error':'' }}">
            <label for="input-title" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="input-title" name="title" placeholder="标题" value="{{ Input::old('title') ? : $post->title }}">
            </div>
            <div class="col-sm-4">
                <label class="control-label" for="input-title">{{ $errors->first('title') }}</label>
            </div>
        </div>
        <div class="form-group {{ $errors->get('content') ?'has-error':'' }}">
            <label for="" class="col-sm-2 control-label">内容</label>
            <div class="col-sm-10">
                <script id="editor" type="text/plain" style="height:500px;" name="content">{!! Input::old('content') ? : $post->content !!} </script>
                <label class="control-label" >{{ $errors->first('content') }}</label>
            </div>
        </div>

        <div class="form-group {{ $errors->get('thumb_img') ?'has-error':'' }}">
            <label for="" class="col-sm-2 control-label">预览图</label>
            <div class="col-sm-10">
                <script id="editor_img" type="text/plain" name="thumb_img">{!! Input::old('thumb_img') ? : $post->thumb_img !!}</script>
                <label class="control-label" >{{ $errors->first('thumb_img') }}</label>
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
        window.UEDITOR_HOME_URL = '{{ asset("static/ueditor") }}/';
    </script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('js/ueditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('static/ueditor/ueditor.all.min.js') }}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('static/ueditor/lang/zh-cn/zh-cn.js') }}"> </script>
    <script type="text/javascript">
        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        var ue = UE.getEditor('editor');
        var ue_img = UE.getEditor('editor_img', {
            'toolbars' : [[
                'simpleupload','insertimage'
            ]]
        });
    </script>
@endsection