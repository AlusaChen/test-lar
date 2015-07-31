<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Auth;
//use Validator;


class UeUploadController extends Controller
{
    public function index()
    {
        echo '<pre>';
        print_r(config('ueupload'));
        echo '</pre>';
        echo 'hello world';
    }

}