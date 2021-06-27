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

    public function borrow() {
        $user_id = Request::param('user_id');
        $book_id = Request::param('book_id');

        $returnDate = date('Y-m-d', time() + 604800) ;

        $borrowRes = BorrowBooks::create([
            'book_id'  =>  $book_id,
            'user_id' =>  $user_id,
            'returnDate' => $returnDate,
        ]);


        $book = Books::where('id', $book_id)->find();
        $book->number = $book->number - 1;
        $bookRes = $book->save();

        return [
            'bookRes' => $bookRes,
            'borrowRes' => $borrowRes,
        ] ;
    }

    public function return() {
        $book_id = Request::param('book_id');
        $id = Request::param('id');
//        $book_id = 2;
//        $id = 5;
        $res = BorrowBooks::where('id', $id)->delete();

        if($res) {
            $book = Books::where('id', $book_id)->find();
            $book->number = $book->number + 1;
            $res = $book->save();
        }
        return $res;
    }
}
