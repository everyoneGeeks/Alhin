<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\favouriteCompany;
use App\favouriteEmployee;
use App\Company;
use App\Employee;

use App\Http\Resources\favEmployee;


class Favourite extends Controller
{
    /**  
    * This api will be used to change the password of the employee if his account is exists.
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

        #check if code is right
        $favEmployee=favouriteCompany::where('company_id',$company->id)->where('employee_id',$request->employee_id)->first();

        if($favEmployee == NULL ){
            $favEmployee=new favouriteCompany;
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
}
