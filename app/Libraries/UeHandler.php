<?php
namespace App\Libraries;

use Request;

class UeHandler
{
    protected $class_name;
    public function __construct()
    {
        $handler = Request::input('action');
        $matches = [];
        preg_match('/^(upload|list|catch)?(.*)/', $handler, $matches);
        $this->class_name = ucfirst($matches[1]).ucfirst($matches[2]);

    }

    public function do_handle()
    {
        $ret = [];
        if($this->class_name)
        {
            $class_name = __NAMESPACE__.'\Ue\\'.$this->class_name;
            $obj = new $class_name();
            $ret = call_user_func(array($obj, 'do_handle'));
        }
        return $ret;
    }

}