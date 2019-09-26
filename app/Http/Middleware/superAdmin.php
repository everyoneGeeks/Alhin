<?php

namespace App\Http\Middleware;

use Closure;

class superAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        
        if(\Auth::user()->is_super_admins == 1){
                return $next($request);
            }else{
                \Notify::error(' عير مصرح غير للادمن فقط', 'غير مصرح');
                return redirect()->back();
            }
    }
}
