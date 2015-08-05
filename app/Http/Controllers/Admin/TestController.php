<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $request->isMethod('post');
        return 'test';
    }
}