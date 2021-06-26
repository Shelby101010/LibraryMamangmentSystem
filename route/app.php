<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;


Route::resource('index', 'Index');

Route::rule('remove','Index/remove','POST');
Route::rule('modify','Index/modify','POST');
Route::rule('login','Index/login','GET');
Route::rule('saveUser','Index/saveUser','POST');

Route::rule('reader','Reader/index' );
Route::rule('reader_read','Reader/read', 'POST');
Route::rule('reader_borrow','Reader/borrow', 'POST');
Route::rule('reader_return','Reader/return', 'POST');


