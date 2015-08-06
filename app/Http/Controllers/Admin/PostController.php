<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Term;
use Auth;
use App\Http\Requests\StoreBlogPostRequest;
use App\Model\Post;

class PostController extends Controller
{
    //文章列表
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('post.list', [
            'posts' => $posts
        ]);
    }

    //详情
    public function view($id)
    {
        $post = Post::find($id);

        return view('post.view', [
            'post' => $post
        ]);
    }

    //发布
    public function add()
    {
        $categories = Term::get_item_by_type('category');
        $tags = Term::get_item_by_type('tag');

        $post = new Post();
        return view('post.add', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    //编辑
    public function edit($id)
    {
        $categories = Term::get_item_by_type('category');
        $tags = Term::get_item_by_type('tag');

        $post = Post::find($id);
        $relations = array_column($post->relations->toArray(), 'term_id');
        return view('post.add', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'relations' => $relations,
        ]);
    }

    //保存
    public function store(StoreBlogPostRequest $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $content = $request->input('content');
        $summary = str_summary($content, 100);
        $thumb_img = $request->input('thumb_img');

        $category = $request->input('category');
        $tags = $request->input('tags');

        if($id)
        {
            $post = Post::find($id);
        }
        else
        {
            $post = new Post;
            $post->author = Auth::user()->id;
        }

        $post->title = $title;
        $post->summary = $summary;
        $post->content = $content;
        $post->thumb_img = $thumb_img;

        $post->save();

        $relations = [];
        $relations[] = ['term_id' => $category];
        foreach($tags as $tag)
        {
            $relations[] = ['term_id' => $tag];
        }
        if($relations)
        {
            $post->save_relations($relations);
        }
        return redirect()->action('Admin\PostController@index');
    }
}