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
            if(!$perm) $perm = [];
        }
        else
        {
            //$user = new User;
        }

        $perms = Term::get_item_by_type('permission');

        //print_this($perms);
        //print_this($perm);

        return view('perm.perm', [
            'perms' => $perms,
            'has_perm' => $perm
        ]);

    }

    public function role($rid)
    {
        Debugbar::disable();

        if($rid)
        {
            $role = Term::where('id', $rid)
                ->where('type', 'role')
                ->first();

            $perm = $role->perm ?:[];
        }
        else
        {
            $perm = Term::get_item_by_type('permission');
        }


        return view('perm.perm', [
            'perms' => $perm,
            'has_perm' => []
        ]);
    }

}