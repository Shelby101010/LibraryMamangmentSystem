<?php
declare (strict_types = 1);

namespace app\middleware;

use think\facade\Session;

class CheckAdmin
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        if (Session::get('category') == 'admin') {
            return $next($request);
        } else {
            Session::set('error', '您的账号无权查看该页面');
            return redirect('error')->with('error','您无权访问此页面！');
        }
    }
}
