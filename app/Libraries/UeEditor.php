<?php
namespace App\Libraries;

use Request;

class UeEditor
{
    public function do_handle()
    {
        $handler = Request::input('action');
        $matches = [];
        preg_match('/^(upload|list|catch)?(.*)/', $handler, $matches);
        $class_name = ucfirst($matches[1]).ucfirst($matches[2]);
        $config = config('ueditor');
        $ret = [];
        if($class_name)
        {
            $class_name = __NAMESPACE__.'\Ue\\'.$class_name;
            $obj = new $class_name($config);
            $ret = call_user_func(array($obj, 'do_handle'));
        }
        return $ret;
    }
}