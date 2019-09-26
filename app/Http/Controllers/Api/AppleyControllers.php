<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Appley as ResourceAppley;
use App\Appley;
use App\Employee;

/*
|--------------------------------------------------------------------------
| AppleyControllers
|--------------------------------------------------------------------------
| this will handle all Appley part 
| R 
*/
/**
                      _            
    /\               | |           
   /  \   _ __  _ __ | | ___ _   _ 
  / /\ \ | '_ \| '_ \| |/ _ \ | | |
 / ____ \| |_) | |_) | |  __/ |_| |
/_/    \_\ .__/| .__/|_|\___|\__, |
         | |   | |            __/ |
         |_|   |_|           |___/ 

 */
class AppleyControllers extends Controller
{
/**  
*This api will to appley   employee To job
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function appley(Request $request){
    $rules = [
        'apiToken' => 'required|exists:employee,apiToken',
        'jobId'    =>'required|exists:job,id',
    ];

    $messages = [
        'apiToken.required' => '400',
        'apiToken.exists' => '405',
        'jobId.required' => '400',
        'jobId.exists' => '405',
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['status'=>(int)$validator->errors()->first()]);
            }
    #Start logic
    $employee = Employee::where('apiToken', $request->apiToken)->first();
    #check if employee is Register 
    $check=Appley::where('employee_id',$employee->id)->where('job_id',$request->jobId)->first();
    if($check){
        return response()->json(['status'=>409]);
    }
    $Appley=new Appley;
    $Appley->employee_id=$employee->id;
    $Appley->job_id=$request->jobId;
    $Appley->save();

    return response()->json(['status'=>200]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['status' =>404]);
             }
        }// end funcrion


/**  
*This api will to get Appley Jobs  for   employee
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function getAppley(Request $request){
    $rules = [
        'apiToken' => 'required|exists:employee,apiToken',

    ];

    $messages = [
        'apiToken.required' => '400',
        'apiToken.exists' => '405',
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['status'=>(int)$validator->errors()->first()]);
            }
    #Start logic
    $employee = Employee::where('apiToken', $request->apiToken)->first();
    $request->language=$employee->language;
    #check if employee is Register 
    $jobs=Appley::where('employee_id',$employee->id)->get();

    if($jobs->isEmpty()){
        return response()->json(['status'=>204]);
    }



    return response()->json(['status'=>200,'jobs'=>ResourceAppley::collection($jobs)]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['status' =>404]);
             }
        }// end funcrion        
}
