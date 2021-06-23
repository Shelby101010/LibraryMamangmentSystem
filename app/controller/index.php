<?php
declare (strict_types=1);

namespace app\controller;

use app\model\Admin;
use app\model\Books;
use app\model\User;
use think\facade\Request;
use think\facade\View;
use think\Model;


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
        return 'create';
    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $res = 0;
        $active = Request::param('active');
        $formData = Request::param('data');

        switch ($active) {
            case '1':
                $books = new Books();
                $res = $books->save($formData);
                break;
            case '2':
                $user = new User();
                $res = $user->save($formData);
                break;
            case '3':
                $admin = new Admin();
                $res = $admin->save($formData);
                break;
        }
        return $res;

    }

    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function read($id)
    {
        $res = '';
        switch ($id) {
            case '1':
                $res = Books::select();
                break;
            case '2':
                $res = User::select();
                break;
            case '3':
            $res = Admin::select();
                break;
        }
        return $res;
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        return 'edit';
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request
     * @param int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        return 'update';
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        return 'delete';
    }

    public  function remove(Request $request) {
        $active = Request::param('active');
        $id = Request::param('id');
        $res = '';
        switch ($active) {
            case '1':
                $book = Books::find($id);
                $res = $book->delete();
                break;
            case '2':
                $user = User::find($id);
                $res = $user->delete();
                break;
            case '3':
                $admin= Admin::find($id);
                $res = $admin->delete();
                break;
        }
        return $res;
    }

    public function modify(Request $request) {
        $active = Request::param('active');
        $id = Request::param('id');
        $data = Request::param('data');
        $res='';
        switch ($active) {
            case '1':
                $book = Books::find($id);
                $book->name     = $data['name'];
                $book->number    = $data['number'];
                $book->category    = $data['category'];
                $res = $book->save();
                break;
            case '2':
                $user = User::find($id);
                $user->username     = $data['username'];
                $user->password    = $data['password'];
                $res = $user->save();
                break;
            case '3':
                $admin = Admin::find($id);
                $admin->username     = $data['username'];
                $admin->password    = $data['password'];
                $res = $admin->save();
                break;
        }
        return $res;
    }
}
