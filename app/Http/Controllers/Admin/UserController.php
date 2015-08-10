<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\User;

class UserController extends Controller
{
    public function index()
    {

        return '<br>user index';
    }



    public function add()
    {
        return view('user.add', [
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.add', [
        ]);
    }
}