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

    $message=[
        "apiToken.required"=>$this->errorMessage[400]['en'],
        "apiToken.exists"=>$this->errorMessage[405]['en'],
        "jobId.required"=>$this->errorMessage[400]['en'],
        "jobId.exists"=>$this->errorMessage[405]['en'],
    ];
        try{
            $validator = \Validator::make($request->all(), $rules);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }
    #Start logic
    $employee = Employee::where('apiToken', $request->apiToken)->first();
    #check if employee is Register 
    $check=Appley::where('employee_id',$employee->id)->where('job_id',$request->jobId)->first();
    if($check){
        return response()->json(['message'=>$this->errorMessage[409][$employee->language]]);
    }
    $Appley=new Appley;
    $Appley->employee_id=$employee->id;
    $Appley->job_id=$request->jobId;
    $Appley->save();

    return response()->json(['message'=>$this->errorMessage[200][$employee->language]]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['message' =>$this->errorMessage[404][$employee->language]]);
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
        'apiToken.required' => $this->errorMessage[400]['en'],
        'apiToken.exists' =>$this->errorMessage[405]['en'],
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }
    #Start logic
    $employee = Employee::where('apiToken', $request->apiToken)->first();
    $request->language=$employee->language;
    #check if employee is Register 
    $jobs=Appley::where('employee_id',$employee->id)->get();

    if($jobs->isEmpty()){
        return response()->json(['message'=>$this->errorMessage[204][$employee->language]]);
    }



    return response()->json(['message'=>$this->errorMessage[200][$employee->language],'appley'=>ResourceAppley::collection($jobs)]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['message' =>$this->errorMessage[404][$employee->language]]);
             }
        }// end funcrion        




/**  
*This api will to un appley Jobs  for   employee
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function unAppley(Request $request){
    $rules = [
        'apiToken' => 'required|exists:employee,apiToken',
        'appley_id'=>'required|exists:applyed,id'

    ];

    $messages = [
        'apiToken.required' => $this->errorMessage[400]['en'],
        'apiToken.exists' => $this->errorMessage[405]['en'],
        'appley_id.required' =>$this->errorMessage[400]['en'],
        'appley_id.exists' =>$this->errorMessage[405]['en'],
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }
            #Start logic
            $employee = Employee::where('apiToken', $request->apiToken)->first();
            $request->language=$employee->language;
            #check if employee is Register 
            $job=Appley::where('id',$request->appley_id)->delete();




    return response()->json(['message'=>$this->errorMessage[200]['en']]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['message' =>$this->errorMessage[404]['en']]);
             }
        }// end funcrion                
}
