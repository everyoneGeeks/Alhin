<?php

namespace App\Http\Middleware;

use Closure;
use App\Employee;
use App\Company;
use App\Setting;

class changeLang
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

        if($request->language !== NULL){
            return $next($request);
        }else{
            if($request->apiToken !==NULL ){
                $company=Company::where('apiToken',$request->apiToken)->first();
                $employee=Employee::where('apiToken',$request->apiToken)->first();

                if($company !== NULL){
                    $request->language=$company->language;
                    return $next($request);
                }


                if($employee !== NULL){
                    $request->language=$employee->language;
                    return $next($request);
                } 


            }
        }

        $request->language=$app_setting=Setting::first()->language;
        return $next($request);

    }
}
