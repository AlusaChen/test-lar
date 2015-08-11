<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Route;

class Permission
{
    public function handle(Request $request, Closure $next, $need_permission = null)
    {
        var_dump(Route::currentRouteAction());
        if($need_permission)
        {
            var_dump($need_permission);
        }
        else
        {
            var_dump($request->user()->hasRole($need_permission));
            var_dump($request->path());
        }
        return $next($request);
    }
}

