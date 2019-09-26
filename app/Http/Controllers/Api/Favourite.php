<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\favouriteCompany;
use App\favouriteEmployee;
use App\Company;
use App\Employee;
use App\Http\Resources\favEmployee;
use App\Http\Resources\favCampany;


class Favourite extends Controller
{
    /**  
    * This api will to get all favourite employee for company
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function favourite_company(Request $request){
        $rules=[
            'apiToken'=>'required|exists:company,apiToken',
        ];
        
        $messages=[
            'apiToken.required'=>'400',
            'apiToken.exists'=>'400',
        ];
            try{
                $validator = \Validator::make($request->all(), $rules, $messages);
                if($validator->fails()) {
                    return response()->json(['status'=>(int)$validator->errors()->first()]);
                }
        #Start logic
        $company=Company::where('apiToken',$request->apiToken)->first();
        $request->language=$company->language;
        #check if code is right
        $favEmployee=favouriteCompany::where('company_id',$company->id)
        ->with('employee')->get();


        if($favEmployee->isEmpty()){
            return response()->json(['status'=>204]);
        }
        
    
        return response()->json(['status'=>200,'favourite'=>favEmployee::collection($favEmployee)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
            }// end funcrion


    /**  
    * This api will to add  favourite employee for company
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function MakeFavourite_company(Request $request){
        $rules=[
            'apiToken'=>'required|exists:company,apiToken',
            'employee_id'=>'required|exists:employee,id'
        ];
        
        $messages=[
            'apiToken.required'=>'400',
            'apiToken.exists'=>'400',
            'employee_id.required'=>'400',
            'employee_id.exists'=>'400',
        ];
            try{
                $validator = \Validator::make($request->all(), $rules, $messages);
                if($validator->fails()) {
                    return response()->json(['status'=>(int)$validator->errors()->first()]);
                }
        #Start logic
        $company=Company::where('apiToken',$request->apiToken)->first();
        $request->language=$company->language;
        #check if code is right
        $favEmployee=favouriteCompany::where('company_id',$company->id)->where('employee_id',$request->employee_id)->first();

        if($favEmployee == NULL ){
            $favEmployee=new favouriteEmployee;
            $favEmployee->company_id=$company->id;
            $favEmployee->employee_id=$request->employee_id;
            $favEmployee->created_at=\Carbon\Carbon::now();
            $favEmployee->save();
        }else {
            #unfavouiret
            $favEmployee->delete();
        }


        
    
        return response()->json(['status'=>200]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
            }// end funcrion   
            
            

    /**  
    * This api will to get all favourite company for employee
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function favourite_employee(Request $request){
        $rules=[
            'apiToken'=>'required|exists:employee,apiToken',
        ];
        
        $messages=[
            'apiToken.required'=>'400',
            'apiToken.exists'=>'405',
        ];
            try{
                $validator = \Validator::make($request->all(), $rules, $messages);
                if($validator->fails()) {
                    return response()->json(['status'=>(int)$validator->errors()->first()]);
                }
        #Start logic
        $Employee=Employee::where('apiToken',$request->apiToken)->first();
        $request->language=$Employee->language;
        #check if code is right
        $favouriteEmployee=favouriteEmployee::where('employee_id',$Employee->id)
        ->with('job')->get();


        if($favouriteEmployee->isEmpty()){
            return response()->json(['status'=>204]);
        }
        
    
        return response()->json(['status'=>200,'favourite'=>favCampany::collection($favouriteEmployee)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
            }// end funcrion


    /**  
    * This api will to add  favourite company for employee
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function MakeFavourite_employee(Request $request){
        $rules=[
            'apiToken'=>'required|exists:employee,apiToken',
            'job_id'=>'required|exists:job,id'
        ];
        
        $messages=[
            'apiToken.required'=>'400',
            'apiToken.exists'=>'400',
            'job_id.required'=>'400',
            'job_id.exists'=>'400',
        ];
            try{
                $validator = \Validator::make($request->all(), $rules, $messages);
                if($validator->fails()) {
                    return response()->json(['status'=>(int)$validator->errors()->first()]);
                }
        #Start logic
        $Employee=Employee::where('apiToken',$request->apiToken)->first();
        $request->language=$Employee->language;
        #check if code is right
        $favouriteEmployee=favouriteEmployee::where('job_id',$request->job_id)->where('employee_id',$Employee->id)->first();

        if($favouriteEmployee == NULL ){
            $favouriteEmployee=new favouriteEmployee;
            $favouriteEmployee->job_id=$request->job_id;
            $favouriteEmployee->employee_id=$Employee->id;
            $favouriteEmployee->created_at=\Carbon\Carbon::now();
            $favouriteEmployee->save();
        }else {
            #unfavouiret
            $favouriteEmployee->delete();
        }


        
    
        return response()->json(['status'=>200]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
            }// end funcrion              
}
