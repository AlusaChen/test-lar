<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Editor;
use Debugbar;


class UeUploadController extends Controller
{
    public function index()
    {
        Debugbar::disable();

        $result = Editor::do_handle();

        if (isset($_GET["callback"]))
        {
            if (preg_match("/^[\w_]+$/", $_GET["callback"]))
            {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
                exit;
            }
            else
            {
                echo json_encode(array(
                    'state'=> 'callback参数不合法'
                ));
            }
        }
        else
        {
            if(is_array($result)) $result = json_encode($result);
            echo $result;
        }
    }
}