<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\Admin;
use app\model\User;
use think\facade\Request;
use think\facade\Session;
use think\facade\View;


class Login
{
    public function index()
    {
        return View::fetch('login/index');
    }

    public function hello()
    {
        return redirect('/reader');
    }

    public function check(Request $request)
    {
        $category = Request::param('category');
        $password = Request::param('password');
        $username = Request::param('username');

        switch ($category) {
            case 0:
                $list = Admin::where('username', $username)->find();
                if($list) {
                    if($list->password == $password){
                        Session::set('username', $list->username);
                        Session::set('category', 'admin');
                        $res = '管理员登录成功！';
                    }
                    else
                        $res = '密码错误';
                } else {
                    $res = '未找到该用户';
                }
                break;
            case 1:
                $list = User::where('username', $username)->find();
                if($list) {
                    if($list->password == $password){
                        Session::set('username', $list->username);
                        Session::set('category', 'user');
                        $res = '用户登录成功！';
                    }
                    else
                        $res = '密码错误';
                } else {
                    $res = '未找到该用户';
                }
                break;
            default:
                $res = '类别错误！';
                break;
        }

        return $res;

    }
}
