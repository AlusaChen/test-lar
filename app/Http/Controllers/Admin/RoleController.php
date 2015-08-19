<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Term;
use Validator;
use Request;

/**
 * 每个role最多可以被一个其他role包含
 * 子role权限不能大于父role权限
 * 分配时从高级role往下分
 * Class RoleController
 * @package App\Http\Controllers\Admin
 */

class RoleController extends Controller
{

    public function index()
    {
        $roles = Term::get_item_by_type('role');
        return view('role.list', [
            'roles' => $roles
        ]);
    }

    public function add()
    {
        $role = new Term();

        $terms = Term::get_item_by_type('role');
        return view('role.add', [
            'role' => $role,
            'terms' => $terms,
        ]);
    }

    public function edit($rid)
    {
        $role = Term::find($rid);
        $terms = Term::get_item_by_type('role', 0, $rid);
        return view('role.add', [
            'role' => $role,
            'terms' => $terms,
        ]);
    }

    public function store()
    {
        $validator = Validator::make(Request::all(), [
            'name' => 'required|max:255',
            'cname' => 'required|max:10',
            'perm' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $id = (int)Request::input('id');
        $pid = (int)Request::input('pid');
        $name = Request::input('name');
        $cname = Request::input('cname');
        $desc = Request::input('desc');
        $perm = Request::input('perm');

        if($id)
        {
            $role = Term::find($id);

            //检测类别 不能加到 不同的分类和子分类
            $terms = Term::get_item_by_type('role');
            $terms = array_assort($terms, 'id', 'pid', 0, $id);

            if($pid && $pid != $role->pid && !in_array($pid, array_keys($terms)))
            {
                $validator->errors()->add('type', '类别不正确');
                return back()->withErrors($validator)->withInput();
            }

            $role->id = $id;
        }
        else
        {
            $role = new Term();
            $role->type = 'role';
        }

        $role->pid = $pid;
        $role->name = $name;
        $role->cname = $cname;
        $role->desc = $desc;
        $role->save();

        $role->set_value_by_key('perm', $perm);
        return redirect()->action('Admin\RoleController@index');
    }
}