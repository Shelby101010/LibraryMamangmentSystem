<?php
declare (strict_types=1);

namespace app\controller;

use app\model\Admin;
use app\model\Books;
use app\model\BorrowBooks;
use app\model\User;
use mysql_xdevapi\Exception;
use think\exception\ErrorException;
use think\facade\Request;
use think\facade\View;

class reader
{
    public function index()
    {
        return View::fetch("reader/index");
//        $res = '';
//        switch ($id) {
//            case '1':
//                $res = Books::select();
//                break;
//            case '2':
//                $res = '已经借阅的书籍列表';
//                break;
//        }
//        return $res;
    }

    public function read(Request $request)
    {
        $tableId = Request::param('tableId');
        $userId = Request::param('userId');

        $res = [];
        switch ($tableId) {
            case 1:
                $res = Books::where('number', '>', 0)->select();
                break;
            case 2:
                $list = BorrowBooks::where('user_id', $userId)->select();

                foreach ($list as $value) {
                    $book = Books::where('id', $value->book_id)->find();
                    $row = [
                        'id' => $value->id,
                        'book_id' => $value->book_id,
                        'book_name' => $book->name,
                        'book_category' => $book->category,
                        'borrow_returnDate' => $value->returnDate,
                    ];
                    array_push($res, $row);
                }
                break;
            default:
                $res = 'tableId错误！';
        }
        return $res;
    }

}
