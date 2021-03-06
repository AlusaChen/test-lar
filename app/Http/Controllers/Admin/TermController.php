<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Request;
use App\Model\Term;

class TermController extends Controller
{
    //文章列表
    public function index($type = '')
    {
        $terms = Term::get_item_by_type($type);

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
        $term = new Term();
        $term->type = $type;

        return view('term.add', [
            'term' => $term,
            'terms' => $terms,
        ]);
    }

    //编辑
    public function edit($id)
    {
        $term = Term::find($id);

        $terms = Term::get_item_by_type($term->type, 0, $id);

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
        $pid = (int)Request::input('pid');
        $type = Request::input('type');
        $name = Request::input('name');
        $cname = Request::input('cname');
        $desc = Request::input('desc');

        if($id)
        {
            $term = Term::find($id);

            //检测类别 不能加到 不同的分类和子分类
            $terms = Term::get_item_by_type($term->type);
            $terms = array_assort($terms, 'id', 'pid', 0, $id);

            if($pid && $pid != $term->pid && !in_array($pid, array_keys($terms)))
            {
                $validator->errors()->add('type', '类别不正确');
                return back()->withErrors($validator)->withInput();
            }
        }
        else
        {
            $term = new Term();
            $term->type = $type;
        }

        $term->pid = $pid;
        $term->name = $name;
        $term->cname = $cname;
        $term->desc = $desc;

        $term->save();

        return redirect()->action('Admin\TermController@index', ['type' => $type]);
    }
}