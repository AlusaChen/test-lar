<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use App\Model\Term;
use Validator;
use Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('user.list', [
            'users' => $users
        ]);
    }

    public function add()
    {
        $user = new User();
        return view('user.add', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.add', [
            'user' => $user
        ]);
    }

    public function store()
    {

        $validator = Validator::make(Request::all(), [
            'email' => 'required|email|unique:admins|max:255',
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'repassword' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $id = (int)Request::input('id');
        $email = Request::input('email');
        $password = bcrypt(Request::input('password'));
        $name = Request::input('name');

        if($id)
        {
            $user = User::find($id);
        }
        else
        {
            $user = new User();
            $user->id = $id;
        }

        $user->email = $email;
        $user->password = $password;
        $user->name = $name;

        $user->save();

        return redirect()->action('Admin\UserController@index');
    }

    public function perm($id)
    {
        $user = User::find($id);
        return view('user.perm', [
            'user' => $user,
        ]);
    }

    public function set_perm($id)
    {
        $user = User::find($id);

        $validator = Validator::make(Request::all(), [
            'perm' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->set_value_by_key('perm', Request::input('perm'));


        return redirect()->action('Admin\UserController@index');

    }
}