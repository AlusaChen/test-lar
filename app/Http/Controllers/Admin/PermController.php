<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use App\Model\Term;
use Debugbar;

class PermController extends Controller
{

    public function index($uid = 0)
    {
        Debugbar::disable();
        //$user = User::find($uid);

        $perm = [];
        if($uid)
        {
            $user = User::find($uid);
            $perm = $user->perm;
        }
        else
        {
            //$user = new User;
        }

        $perms = Term::get_item_by_type('permission');

        //print_this($perms);
        //print_this($perm);

        return view('perm.list', [
            'perms' => $perms,
            'has_perm' => $perm
        ]);

    }
}