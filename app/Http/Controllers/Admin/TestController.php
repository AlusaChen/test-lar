<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        return 'test';
    }
}