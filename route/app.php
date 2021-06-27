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
use app\middleware\CheckUser;
use think\facade\Route;
use app\middleware\CheckAdmin;

Route::resource('index', 'Index')->middleware('checkAdmin');
Route::rule('remove','Index/remove','POST')->middleware('checkAdmin');
Route::rule('modify','Index/modify','POST')->middleware('checkAdmin');
Route::rule('saveUser','Index/saveUser','POST')->middleware('checkAdmin');

Route::rule('reader','Reader/index')->middleware('checkUser');
Route::rule('reader_read','Reader/read', 'POST')->middleware('checkUser');
Route::rule('reader_borrow','Reader/borrow', 'POST')->middleware('checkUser');
Route::rule('reader_return','Reader/return', 'POST')->middleware('checkUser');

Route::rule('login','Login/index');
Route::rule('login_check','Login/check', 'POST');
Route::rule('login_register','Login/register', 'POST');

Route::rule('error','Error/index');

Route::rule('logOut','LogOut/index');


