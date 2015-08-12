<?php

namespace App\Http\Middleware;

use App\Model\Term;
use Illuminate\Http\Request;
use Closure;
use Route;
use Debugbar;

class Permission
{
    /*
    protected $exclude = [

    ];
    */

    /**
     * 根据currentRouteName 和 action 判断权限
     * 如果currentRouteName不存在，则不判断权限
     *
     * 如
     *  currentRouteName = Admin::term
     *  action = add
     * 则
     *  check_perm = term.add
     * 如果
     *  term.add 不存在
     * 则
     *  按照currentRouteName 判断权限
     *  check_perm = term
     * 如 check_perm 不存在 则不判断
     *
     * @param Request $request
     * @param Closure $next
     * @param null $need_permission
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle(Request $request, Closure $next, $need_permission = null)
    {
        $has_access = false;
        $current_route = Route::currentRouteAction();
        Debugbar::info('current route : '.$current_route);
        Debugbar::info('current route name : '.Route::currentRouteName());
        $route_name = substr(Route::currentRouteName(), 7);
        if($route_name && $current_route)
        {
            $arr_route = explode('@', $current_route);
            $action = strtolower($arr_route[1]);

            /*
            $arr_controller = explode('\\', $arr_route[0]);
            $controller = array_pop($arr_controller);
            $controller = strtolower(substr($controller, 0, strlen($controller) - 10));
            $perm = $controller.($action == 'index' ?'':'.'.$action);
            */

            //admin::term.add
            $perm = $route_name.($action == 'index' ?'':'.'.$action);
            Debugbar::info('perm '.$perm);

            $perms = Term::get_all_permission();

            $check_perm = '';
            if(array_key_exists($perm, $perms))
                $check_perm = $perms[$perm];
            else if(array_key_exists($route_name, $perms))
                $check_perm = $perms[$route_name];

            Debugbar::info('check perm : id='.$check_perm);

            if($check_perm)
            {
                if($request->user()->has_permission($check_perm))
                    $has_access = true;
            }
            else
            {
                $has_access = true;
            }

        }
        else
            $has_access = true;


        if($has_access)
            return $next($request);
        else
            return redirect('/admin/');
    }
}

