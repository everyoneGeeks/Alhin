<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\employee as employeeResource;
use App\Employee;
use Validator;
use Hash;
/*
|--------------------------------------------------------------------------
| EmployeeControllers
|--------------------------------------------------------------------------
| this will handle all employee part 
| R 
*/
/**
                      _                       
                     | |                      
  ___ _ __ ___  _ __ | | ___  _   _  ___  ___ 
 / _ \ '_ ` _ \| '_ \| |/ _ \| | | |/ _ \/ _ \
|  __/ | | | | | |_) | | (_) | |_| |  __/  __/
 \___|_| |_| |_| .__/|_|\___/ \__, |\___|\___|
               | |             __/ |          
               |_|            |___/      
 */
class EmployeeControllers extends Controller
{
/**  
* This api will be used to register new employee
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function register(Request $request){
    $rules=[
       // 'logo'=>'required|image',
        'name'=>'required',
        'email'=>'required|email|unique:employee,email',
        'password'=>'required|min:6',
        'language'=>'required|in:ar,en'
    ];
    
    $messages=[
       // 'logo.required'=>'400',
       // 'logo.image'=>'400',
        'name.required'=>$this->errorMessage[400][$request->language],
        'email.required'=>$this->errorMessage[400][$request->language],
        'email.email'=>$this->errorMessage[405][$request->language],
        'email.unique'=>$this->errorMessage[409][$request->language],
        'password.required'=>$this->errorMessage[400][$request->language],
        'language.required'=>$this->errorMessage[400][$request->language],
        'password.min'=>$this->errorMessage[400][$request->language],
        'language.in'=>$this->errorMessage[400][$request->language]
    ];
        try{
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }
    #Start logic
    $employee=new Employee;
    $employee->name=$request->name;
    $employee->apiToken=\Str::random(64);
    $employee->email=$request->email;
    $employee->password=Hash::make($request->password);
    $employee->language=$request->language;
    $employee->save();
    
    return response()->json(['message'=>$this->errorMessage[200][$request->language],'employee'=>new employeeResource($employee)]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['message' =>$this->errorMessage[404][$request->language]]);
             }
        }// end funcrion
    
/**  
* This api will be used to update  company
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function update(Request $request){
    $rules=[
        'apiToken'=>'required|exists:employee,apiToken',
        'logo'=>'image',
        'password'=>'min:6',
        'language'=>'in:ar,en'
    ];
    
    $messages=[
      'logo.image'=>$this->errorMessage[400][$request->language],
        'email.email'=>$this->errorMessage[400][$request->language],
        'email.unique'=>$this->errorMessage[409][$request->language],
        'language.in'=>$this->errorMessage[400][$request->language]
    ];
        try{
            $Employee=Employee::where('apiToken',$request->apiToken)->first();
            $rules['email']='email|unique:employee,email,'.$Employee->id;
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }
    #Start logic


    $request->name == NULL ? :$Employee->name=$request->name;
    $request->email == NULL ? :$Employee->email=$request->email;
    $request->password == NULL ? :$Employee->password=Hash::make($request->password);
    $request->language == NULL ? :$Employee->language=$request->language;
    $request->logo == NULL ? :$this->SaveFile($Employee,'logo','logo','images');
    $Employee->save();

    return response()->json(['message'=>$this->errorMessage[200][$request->language],'employee'=>new employeeResource($employee)]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['message' =>$this->errorMessage[404][$request->language]]);
             }
        }// end funcrion    

    
    /**  
    * This api will be used to login  employee with (password & email)
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function login(Request $request){
        $rules=[
            'email'=>'required|email|exists:employee,email',
            'password'=>'required|min:6',
    
        ];
        
        $messages=[
            'email.required'=>$this->errorMessage[400]['en'],
            'email.email'=>$this->errorMessage[400]['en'],
            'email.exists'=>$this->errorMessage[415]['en'],
            'password.required'=>$this->errorMessage[400]['en'],
            'password.min'=>$this->errorMessage[400]['en'],
        ];
            try{
                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()) {
                    return response()->json(['message'=>$validator->errors()->first()]);
                }
        #Start logic
        #password check
    
        $employee=Employee::where('email',$request->email)->first();
        if(!Hash::check($request->password,$employee->password)){
            return response()->json(['message'=>$this->errorMessage[410]['en']]);
        }
        #login Okay 
        return response()->json(['message'=>$this->errorMessage[200]['en'],'employee'=>new employeeResource($employee)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['message' =>$this->errorMessage[400]['en']]);
                 }
            }// end funcrion    
    
    
 
}
