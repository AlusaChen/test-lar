<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $r = $user->set_value_by_key('job', 'developer');
        var_dump($r);

        return 'user index';
    }
}