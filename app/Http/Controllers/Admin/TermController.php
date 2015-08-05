<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Validator;
use Request;
use App\Model\Term;

class TermController extends Controller
{
    //文章列表
    public function index($type = '')
    {
        $terms = Term::paginate(1);
        return view('term.list', [
            'terms' => $terms
        ]);
    }

    //详情
    public function view($id)
    {
        $term = Term::find($id);
        return view('term.view', [
            'term' => $term
        ]);
    }

    //发布
    public function add($type)
    {
        if(!in_array($type, array_keys(config('terms')))) return redirect('admin/');

        $terms = Term::get_item_by_type($type);
        $terms = array_group($terms);
//        print_this($terms);

        array_flatten_key($terms, 'son');
        print_this($terms);
        $term = new Term();
        $term->type = $type;

        return view('term.add', [
            'term' => $term,
            'terms' => $terms
        ]);
    }

    //编辑
    public function edit($id)
    {
        $term = Term::find($id);


        $terms = Term::get_item_by_type($term->type);
        $terms = array_group($terms);

        return view('term.add', [
            'term' => $term,
            'terms' => $terms
        ]);
    }

    //保存
    public function store()
    {
        $validator = Validator::make(Request::all(), [
            'type' => 'required|max:100',
            'name' => 'required|max:255',
            'cname' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $id = (int)Request::input('id');
        if($id)
        {
            $term = Term::find($id);
        }
        else
        {
            $term = new Term();
        }

        $pid = (int)Request::input('pid');
        $type = Request::input('type');
        $name = Request::input('name');
        $cname = Request::input('cname');
        $desc = Request::input('desc');

        $term->pid = $pid;
        $term->type = $type;
        $term->name = $name;
        $term->cname = $cname;
        $term->desc = $desc;

        $term->save();

        return redirect()->action('Admin\TermController@index');
    }
}