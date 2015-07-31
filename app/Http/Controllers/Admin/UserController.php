<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        /*
        $d = $user->set_value_by_key('age', 30);
        //$d = $user->get_value_by_key('hobby');
        echo '<pre>';
        print_r($d->mkey);
        print_r($d->mvalue);
        echo '</pre>';
        $mdatas = $user->metadata;
        foreach($mdatas as $mdata)
        {
            echo $mdata->mvalue;
        }
        */
        echo '<pre>';
        print_r($user->toArray());
        echo '</pre>';

        return '<br>user index';
    }
}