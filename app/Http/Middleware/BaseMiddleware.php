<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\LoginController;

class BaseMiddleware extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // 1、判断是否登录了
        if ($request->session()->get('username') == null) {
            return redirect('/admin/login');
        }

        //检测登录是过期  一天保质期
        $now = date('Y-m-d', time());
        if ($now != $request->session()->get('login_time')) {   //已过期
            return redirect('/admin/login');
        }

//        dd($request->session()->get('action'));
//        dump('/' . $request->path());
//        $control = $request->getRequestUri();

        // 2、检测权限
        $control = $request->path();

        // 跳过登录系列的检测以及主页权限
        if (!in_array($control, [
            'admin/login',
            'admin/index'
        ])) {
            if (!in_array('/' . $control, $request->session()->get('action'))) {
                dd('没有权限');
            }
        }


        $node = new LoginController();

        $request->attributes->add([
            'username' => session('username'),
            'menu' => $node->getMenu(session('rule')),
            'rolename' => session('role')
        ]);

        return $next($request);
    }
}
