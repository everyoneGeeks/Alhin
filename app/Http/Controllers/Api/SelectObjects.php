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
use App\Job;
use App\CV;
use App\jobRate;
use App\cvRate;


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
        'language.required'=>$this->errorMessage[400][$request->language],
        "language.in"=>$this->errorMessage[405][$request->language]
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=> $validator->errors()->first()]);
            }
    #Start logic
    $residenceCountry=residenceCountry::get();
    #check if empty
    if($residenceCountry->isEmpty()){
        return response()->json(['message'=>$this->errorMessage[204][$request->language]]);
    }
    return response()->json(['message'=>$this->errorMessage[200][$request->language],'residenceCountry'=>ResourcesCountry::collection($residenceCountry)]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['message' =>$this->errorMessage[404][$request->language]]);
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
        'language.required'=>$this->errorMessage[400][$request->language],
        "language.in"=>$this->errorMessage[405][$request->language]
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }
        #Start logic
        $religion=religion::get();
        #check if empty
        if($religion->isEmpty()){
            return response()->json(['message'=>$this->errorMessage[204][$request->language]]);
        }
        return response()->json(['message'=>$this->errorMessage[200][$request->language],'religion'=>ResourcesReligion::collection($religion)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['message' =>$this->errorMessage[404][$request->language]]);
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
        'language.required'=>$this->errorMessage[400][$request->language],
        "language.in"=>$this->errorMessage[405][$request->language]
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }
        #Start logic
        $nationality=nationality::get();
        #check if empty
        if($nationality->isEmpty()){
            return response()->json(['message'=>$this->errorMessage[204][$request->language]]);
        }
        return response()->json(['message'=>$this->errorMessage[200][$request->language],'nationality'=>ResourcesNationality::collection($nationality)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['message' =>$this->errorMessage[404][$request->language]]);
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
        'language.required'=>$this->errorMessage[400][$request->language],
        "language.in"=>$this->errorMessage[405][$request->language]
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }
        #Start logic
        $appInfo=Setting::first();
        #check if empty
        if($appInfo == NULL){
            return response()->json(['message'=>$this->errorMessage[204][$request->language]]);
        }
        return response()->json(['message'=>$this->errorMessage[200][$request->language],'appInfo'=>new ResourcesSetting($appInfo)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['message' =>$this->errorMessage[404][$request->language]]);
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
            'companyApiToken.required' =>$this->errorMessage[400][$request->lang],
            'companyApiToken.exists'   =>$this->errorMessage[400][$request->lang],
            'employeeApiToken.required'=>$this->errorMessage[405][$request->lang],
            'employeeApiToken.exists'  =>$this->errorMessage[405][$request->lang],
            'lang.required'=>$this->errorMessage[400][$request->lang],
            "lang.in"=>$this->errorMessage[405][$request->lang]
        ];
            try{
                $validator = \Validator::make($request->all(), $rules, $messages);

                if($validator->fails()) {
                    return response()->json(['message'=>$validator->errors()->first()]);
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
            return response()->json(['message'=>$this->errorMessage[200][$request->lang]]);
                }catch(Exception $e) {
                   return response()->json(['message' =>$this->errorMessage[404][$request->lang]]);
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
        'email.required'=>$this->errorMessage[400]['en'],
        'email.email'=>$this->errorMessage[405]['en'],
        'message.required'=>$this->errorMessage[400]['en'],

    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }

            $contact=new contact();
            $contact->email=$request->email;
            $contact->message=$request->message;
            $contact->created_at=\Carbon\Carbon::now();
            $contact->save();

        return response()->json(['message'=>$this->errorMessage[200]['en']]);
            }catch(Exception $e) {
               return response()->json(['message'=>$this->errorMessage[404]['en']]);
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
        'companyApiToken.required'=>$this->errorMessage[400]['en'],
        'companyApiToken.exists'=>$this->errorMessage[400]['en'],
        'employeeApiToken.required'=>$this->errorMessage[405]['en'],
        'employeeApiToken.exists'=>$this->errorMessage[405]['en'],
        'firebaseToken.required'=>$this->errorMessage[400]['en'],

    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
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
        return response()->json(['message'=>$this->errorMessage[200]['en']]);
            }catch(Exception $e) {
               return response()->json(['message' =>$this->errorMessage[200]['en']]);
             }
}// end funcrion     



/**  
* This api will used to add view to cv or job 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function view(Request $request){
    $rules=[
        'cv_id'=>'exists:CV,id',
        'job_id'=>'exists:job,id',
    ];
    
    $messages=[
        'cv_id.required'=>$this->errorMessage[400]['en'],
        'cv_id.exists'=>$this->errorMessage[400]['en'],
        'job_id.required'=>$this->errorMessage[405]['en'],
        'job_id.exists'=>$this->errorMessage[405]['en'],
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }

            if($request->job_id){
                $job=Job::where('id',$request->job_id)->first();
                $job->view+=1;
                $job->save();
                return response()->json(['message'=>$this->errorMessage[200]['en']]);
            }


            if($request->cv_id){
                $cv=CV::where('id',$request->cv_id)->first();
                $cv->view+=1;
                $cv->save();
                return response()->json(['message'=>$this->errorMessage[200]['en']]);
            }
            return response()->json(['message'=>$this->errorMessage[405]['en']]);
        return response()->json(['message'=>$this->errorMessage[200]['en']]);
            }catch(Exception $e) {
               return response()->json(['message' =>$this->errorMessage[404]['en']]);
             }
}// end funcrion    





/**  
* This api will used to add rate to cv or job 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function rate(Request $request){
    $rules=[
        'cv_id'=>'exists:CV,id',
        'job_id'=>'exists:job,id',
        'rate'=>'required|max:5'
    ];
    
    $messages=[
        'cv_id.required'=>$this->errorMessage[400]['en'],
        'cv_id.exists'=>$this->errorMessage[400]['en'],
        'job_id.required'=>$this->errorMessage[405]['en'],
        'job_id.exists'=>$this->errorMessage[405]['en'],
        'rate.required'=>$this->errorMessage[405]['en'],
        'rate.max'=>$this->errorMessage[405]['en'],
    ];
        try{
            $validator = \Validator::make($request->all(), $rules, $messages);
            if($validator->fails()) {
                return response()->json(['message'=>$validator->errors()->first()]);
            }

            if($request->job_id){
                $jobRate=new jobRate;
                $jobRate->rate=$request->rate;
                $jobRate->job_id=$request->job_id;
                $jobRate->save();
                return response()->json(['message'=>$this->errorMessage[200]['en']]);

            }


            if($request->cv_id){
                $cvRate=new cvRate;
                $cvRate->rate=$request->rate;
                $cvRate->cv_id=$request->cv_id;
                $cvRate->save();
                return response()->json(['message'=>$this->errorMessage[200]['en']]);
            }

        return response()->json(['message'=>$this->errorMessage[200]['en']]);
            }catch(Exception $e) {
               return response()->json(['message' =>$this->errorMessage[404]['en']]);
             }
}// end funcrion    
}

