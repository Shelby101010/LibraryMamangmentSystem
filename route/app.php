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
use app\middleware\Check;
use think\facade\Route;


Route::resource('index', 'Index')->middleware(Check::class);

Route::rule('remove','Index/remove','POST')->middleware(Check::class);
Route::rule('modify','Index/modify','POST')->middleware(Check::class);
Route::rule('saveUser','Index/saveUser','POST')->middleware(Check::class);

Route::rule('reader','Reader/index')->middleware(Check::class);
Route::rule('reader_read','Reader/read', 'POST')->middleware(Check::class);
Route::rule('reader_borrow','Reader/borrow', 'POST')->middleware(Check::class);
Route::rule('reader_return','Reader/return', 'POST')->middleware(Check::class);

Route::rule('login','Login/index');
Route::rule('login_check','Login/check', 'POST');
//Route::rule('login_hello','Login/hello');


