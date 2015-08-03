<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
//use Validator;
use App\Http\Requests\StoreBlogPostRequest;
use App\Model\Admin\Post;


class PostController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function store(StoreBlogPostRequest $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $thumb_img = $request->input('thumb_img');
        $post = Post::create([
            'title' => $title,
            'content' => $content,
            'thumb_img' => $thumb_img,
            'author' => Auth::user()->id
        ]);
        return redirect()->route('admin::');
    }
}