<?php
declare (strict_types = 1);

namespace app\middleware;

use think\facade\Session;

class CheckUser
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
        if (Session::get('category') == 'user') {
            return $next($request);
        } else {
            return redirect('error')->with('error','您无权访问此页面！');
        }
    }
}
