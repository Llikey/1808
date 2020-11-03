<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $username = $request->get('username');
        $menu = $request->get('menu');
        $rolename = $request->get('rolename');

        return view('admin.index', ['username' => $username, 'menu' => $menu, 'rolename' => $rolename]);
    }

    public function welcome(Request $request)
    {
        $username = $request->get('username');
        return view('admin.welcome', ['username' => $username]);
    }
}
