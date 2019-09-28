<?php

namespace App\Http\Middleware;

use Closure;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  Array  [section name , role name]
     * @return mixed
     */
    public function handle($request, Closure $next,...$param)
    {
        $user=\Auth::user()->permissions;

        $permissions=json_decode($user);

        $sectionName=$param[0];

        $role=$param[1];
        
        if(\Auth::user()->is_super_admins == 0){
            if($permissions->$sectionName->$role == 1){
                return $next($request);
            }else{
                \Notify::error('غير مصرح بدخول  القسم يرجي التواصل مع الادمن لتعديل الصلاحية ', 'غير مصرح');
                return redirect()->back();
            }
        }else{
            return $next($request); 
        }

    }
}
