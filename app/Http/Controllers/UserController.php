<?php
namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{

    public function index()
    {
        $u = User::find(1);
        $d = $u->metadata()->where('mkey','test')->get();
        foreach($d as $v)
        {
            echo $v->mvalue;
            echo '<br />';
        }
        return 'user index';
    }
}