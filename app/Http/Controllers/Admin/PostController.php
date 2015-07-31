<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Auth;
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

        /*
        $title = Request::input('title');
        $content = Request::input('content');
        $post = Post::create([
            'title' => $title,
            'content' => $content,
            'author' => Auth::user()->id
        ]);


        */
        return redirect()->route('admin::');
    }
}