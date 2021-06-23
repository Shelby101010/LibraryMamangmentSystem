<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\Books;
use think\facade\Db;
use think\facade\Request;
use think\facade\View;


class index
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        return View::fetch('index/index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $res = Db::table('table_books')->where('id', 1)->find();
        dump($res);
        $idx = Request::param('id');
        $res = Books::find($idx);
        echo($res);
        return $res;
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
