<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $d = $user->set_value_by_key('job', 'teacher');
        echo '<pre>';
        print_r($d);
        echo '</pre>';
        echo $user->name;
        $mdatas = $user->metadata;
        foreach($mdatas as $mdata)
        {
            echo $mdata->mvalue;
        }

        return '<br>user index';
    }
}