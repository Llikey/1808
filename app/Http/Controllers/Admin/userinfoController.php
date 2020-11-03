<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\admin_user_model;

class userinfoController
{
    public function userinfo()
    {
        return view('admin.userinfo');
    }

    public function setuserinfo(Request $request)
    {
        $data = $request->all();

        $begin = ($data['page'] - 1) * $data['limit'];
        $limit = $data['limit'];

        $result = admin_user_model::orderBy('id', 'asc')->skip($begin)->take($limit)->get()->toArray();

        $ip = $request->ip();
        $time = date('Y-m-d H:i:s', time());
        foreach ($result as $key => $val) {
            $val['ip'] = $ip;
            $val['time'] = $time;

            $valus[] = $val;
        }

        return response()->json(['code' => 0, 'message' => '成功', 'count' => admin_user_model::all()->count(), 'data' => $valus]);
    }
}