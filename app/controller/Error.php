<?php
declare (strict_types=1);

namespace app\controller;

use think\facade\Session;
use think\facade\View;
use think\Request;

class Error
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        if (Session::has('error')) {
            $error = Session::get('error');
            View::assign('error', $error);
            return View::fetch('index');
        }

    }
}
