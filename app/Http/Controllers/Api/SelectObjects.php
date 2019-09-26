<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\residenceCountry as ResourcesCountry;
use App\Http\Resources\religion as ResourcesReligion;
use App\Http\Resources\nationality as ResourcesNationality;
use App\Http\Resources\Setting as ResourcesSetting;
use App\Setting;
use App\Contact;
use App\religion;
use App\nationality;
use App\residenceCountry;
use App\Company;
use App\Employee;

class SelectObjects extends Controller
{
/**  
* This api will to get residence Country 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function residenceCountry(Request $request){
    $rules=[
        'language'=>'required|in:ar,en',
    ];
    
    $messages=[
        'language.required'=>'400',
        "language.in"=>'405'
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['status'=>(int)$validator->errors()->first()]);
            }
    #Start logic
    $residenceCountry=residenceCountry::get();
    #check if empty
    if($residenceCountry->isEmpty()){
        return response()->json(['status'=>204]);
    }
    return response()->json(['status'=>200,'residenceCountry'=>ResourcesCountry::collection($residenceCountry)]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['status' =>404]);
             }
        }// end funcrion
        
/**  
* This api will to get religion
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function religion(Request $request){
    $rules=[
        'language'=>'required|in:ar,en',
    ];
    
    $messages=[
        'language.required'=>'400',
        "language.in"=>'405'
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['status'=>(int)$validator->errors()->first()]);
            }
        #Start logic
        $religion=religion::get();
        #check if empty
        if($religion->isEmpty()){
            return response()->json(['status'=>204]);
        }
        return response()->json(['status'=>200,'religion'=>ResourcesReligion::collection($religion)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
    }// end funcrion     
    
    
/**  
* This api will to get nationality
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function nationality(Request $request){
    $rules=[
        'language'=>'required|in:ar,en',
    ];
    
    $messages=[
        'language.required'=>'400',
        "language.in"=>'405'
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['status'=>(int)$validator->errors()->first()]);
            }
        #Start logic
        $nationality=nationality::get();
        #check if empty
        if($nationality->isEmpty()){
            return response()->json(['status'=>204]);
        }
        return response()->json(['status'=>200,'nationality'=>ResourcesNationality::collection($nationality)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
    }// end funcrion    
    
    
/**  
* This api will be used to get the app info
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function appInfo(Request $request){
    $rules=[
        'language'=>'required|in:ar,en',
    ];
    
    $messages=[
        'language.required'=>'400',
        "language.in"=>'405'
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['status'=>(int)$validator->errors()->first()]);
            }
        #Start logic
        $appInfo=Setting::first();
        #check if empty
        if($appInfo == NULL){
            return response()->json(['status'=>204]);
        }
        return response()->json(['status'=>200,'appInfo'=>new ResourcesSetting($appInfo)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
    }// end funcrion     
    
    
/**  
* This api will change lang for employee or Campany
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function changeLang(Request $request){
        $rules=[
            'employeeApiToken'=>'exists:employee,apiToken',
            'companyApiToken'=>'exists:company,apiToken',
            'lang'=>'required|in:ar,en',
            
        ];
        
        $messages=[
            'companyApiToken.required'=>'400',
            'companyApiToken.exists'=>'400',
            'employeeApiToken.required'=>'405',
            'employeeApiToken.exists'=>'405',
            'lang.required'=>'400',
            "lang.in"=>'405'
        ];
            try{
                $validator = \Validator::make($request->all(), $rules, $messages);
                if($validator->fails()) {
                    return response()->json(['status'=>(int)$validator->errors()->first()]);
                }

            if($request->companyApiToken){
                $company=company::where('apiToken',$request->companyApiToken)->first();
                $company->lang=$request->lang;
                $company->save();
            }else{
                $employee=Employee::where('apiToken',$request->employeeApiToken)->first();
                $employee->lang=$request->lang;
                $employee->save();    
            }     
            return response()->json(['status'=>200]);
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
    }// end funcrion      


/**  
* send message from App to dashboard
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function contact(Request $request){
    $rules=[
        'email'=>'required|email',
        'message'=>'required',
    ];
    
    $messages=[
        'email.required'=>'400',
        'email.email'=>'405',
        'message.required'=>'400',

    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['status'=>(int)$validator->errors()->first()]);
            }

            $contact=new contact();
            $contact->email=$request->email;
            $contact->message=$request->message;
            $contact->created_at=\Carbon\Carbon::now();
            $contact->save() ;
        return response()->json(['status'=>200]);
            }catch(Exception $e) {
               return response()->json(['status' =>404]);
             }
}// end funcrion      


/**  
* This api will add sendFirebaseToken for employee or Campany
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function sendFirebaseToken(Request $request){
    $rules=[
        'employeeApiToken'=>'exists:employee,apiToken',
        'companyApiToken'=>'exists:company,apiToken',
        'firebaseToken'=>'required',
    ];
    
    $messages=[
        'companyApiToken.required'=>'400',
        'companyApiToken.exists'=>'400',
        'employeeApiToken.required'=>'405',
        'employeeApiToken.exists'=>'405',
        'firebaseToken.required'=>'400',

    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['status'=>(int)$validator->errors()->first()]);
            }

        if($request->companyApiToken){
            $company=company::where('apiToken',$request->companyApiToken)->first();
            $company->firebaseToken=$request->firebaseToken;
            $company->save();
        }else{
            $employee=Employee::where('apiToken',$request->employeeApiToken)->first();
            $employee->firebaseToken=$request->firebaseToken;
            $employee->save();    
        }     
        return response()->json(['status'=>200]);
            }catch(Exception $e) {
               return response()->json(['status' =>404]);
             }
}// end funcrion     
}

