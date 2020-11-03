<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use App\admin_user_model;
use App\admin_role_model;
use App\admin_node_model;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function logincheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:2|max:16',
            'password' => 'required|between:3,20',
            'captcha' => 'required|size:4',
        ]);

        //        if ($validator->fails()) {
        //            return redirect('admin/login')
        //                ->withErrors($validator)
        //                ->withInput();
        //        }

        $errors = $validator->errors();

        if ($errors->has('username')) {
            $msg = $errors->first('username');
            return response()->json(['code' => -1, 'msg' => $msg]);
        }
        if ($errors->has('password')) {
            $msg = $errors->first('password');
            return response()->json(['code' => -2, 'msg' => $msg]);
        }
        if ($errors->has('captcha')) {
            $msg = $errors->first('captcha');
            return response()->json(['code' => -3, 'msg' => $msg]);
        }

        $data = $request->all();

        $hasUser = admin_user_model::where('user', $data['username'])->first();

//        if (empty($hasUser)) {   //为空不存在
//            return response()->json(['code' => -4, 'msg' => '用户不存在']);
//        }
//
//        if ($data['password'] != $hasUser['pwd']) {  //密码错误
//            return response()->json(['code' => -5, 'msg' => '密码错误']);
//        }


        $res = Auth::guard('admin')->attempt(['user' => $data['username'], 'password' => $data['password']]);

        if (!$res) {
            return response()->json(['code' => -5, 'msg' => '用户名或密码错误']);
        }

//        if (Hash::check($data['password'], $hasUser['pwd'])) {
//            echo '密码正确';
//        }


        $info = $this->getRoleInfo($hasUser['typeid']);

        $request->session()->put('username', $hasUser['user']);
        $request->session()->put('id', $hasUser['id']);
        $request->session()->put('role', $info['rolename']); //角色名
        $request->session()->put('rule', $info['rule']); //角色节点
        $request->session()->put('action', $info['action']); //角色权限
        $request->session()->put('login_time', date('Y-m-d', time())); //登录时间  年月日

        return response()->json(['code' => 1, 'msg' => '登录成功']);
    }

    /**
     * @param $id
     * @return array
     * 查询该用户有的权限
     */
    public function getRoleInfo($id)
    {
        $info = admin_role_model::find($id)->toArray();
        if ("#" == $info['rule']) {
            $a = true;
        } else {
            $wheres = $info['rule'];
            $a = false;
        }
        if ($a) {
            $res = admin_node_model::all()->toArray();
        } else {
            $ids = explode(',', $wheres);
            $where[] = [function ($query) use ($ids) {
                $query->whereIn('id', $ids);
            }];
            $res = admin_node_model::where($where)->get()->toArray();
        }

        $arr = array();
        foreach ($res as $key => $vo) {
            $arr[] = $vo['module_name'];
        }
        $info['action'] = $arr;

        return $info;
    }

    /**
     * @param $nodestr
     * @return array
     * 查询用户权限获取权限菜单
     */
    public function getMenu($nodestr)
    {
        if ($nodestr == "#") {  //是超级管理员
            $menu = admin_node_model::where('is_menu', 2)->get()->toArray();
        } else {
            $where['is_menu'] = 2;
            $ids = explode(',', $nodestr);

            $where[] = [function ($query) use ($ids) {
                $query->whereIn('id', $ids);
            }];

            $menu = admin_node_model::where($where)->get()->toArray();
        }

        $parent = array();
        $child = array();

        foreach ($menu as $key => $value) {
            if ($value['parentid'] == 0) {
                $value['href'] = '#';
                $parent[] = $value;
            } else {
                $value['href'] = url($value['module_name']);
                $child[] = $value;
            }
        }

        foreach ($parent as $key => $value) {
            foreach ($child as $k => $v) {
                if ($value['id'] == $v['parentid']) {
                    //是父子关系
                    $parent[$key]['child'][] = $v;

                }

            }

        }

        return $parent;
    }

    public function loginOut(Request $request)
    {
//        $request->session()->forget('username');
//        $request->session()->forget('id');
//        $request->session()->forget('role');
//        $request->session()->forget('rule');
//        $request->session()->forget('action');
//        $request->session()->forget('login_time');
        $request->session()->flush();

        return redirect('/admin/login');
    }


}

