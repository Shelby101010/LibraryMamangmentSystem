<?php
declare (strict_types = 1);

namespace app\controller;

use think\facade\Session;
use think\Request;

class LogOut
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        Session::delete('username');
        Session::delete('category');
        if (!Session::has('username') && !Session::has('category')) {
            $res = '注销成功';
        } else {
            $res = '注销失败';
        }
        return $res;

    }
}
