<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\StoreBlogPostRequest;
use App\Model\Post;


class PostController extends Controller
{
    //文章列表
    public function index()
    {
        $posts = Post::paginate(1);
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
        $post = new Post();
        return view('post.add', [
            'post' => $post
        ]);
    }

    //编辑
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.add', [
            'post' => $post
        ]);
    }

    //保存
    public function store(StoreBlogPostRequest $request, $id = 0)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $content = $request->input('content');
        $summary = str_summary($content, 100);
        $thumb_img = $request->input('thumb_img');

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

        return redirect()->action('Admin\PostController@index');
    }
}