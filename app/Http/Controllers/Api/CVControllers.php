<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CV;
use App\Http\Resources\Cv as ResourcesCv ;
use App\Employee;

class CVControllers extends Controller
{
     /**  
    * This api will to add new cv to employee
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function add(Request $request){
        $rules=[
            'apiToken'=>'required|exists:employee,apiToken',
            'phone'  =>'required|unique:CV,phone',
            'date_of_birth'=>'required|date_format:Y-m-d',
            'martial_status'=>'required|in:0,1',
            'residence_country_id'=>'required|exists:residence_country,id',
            'religion_id'=>'required|exists:religion,id',
            'nationality_id'=>'required|exists:nationality,id',
            'total_experience'=>'required',
            'cv'=>'required',
            'job_title'=>'required',
        ];
        
        $messages=[
            'apiToken.required'=>'400',
            'apiToken.exists'=>'405',
            'phone.required'=>'400',
            'phone.unique'=>'405',
            'date_of_birth.required'=>'400',
            'date_of_birth.date_format'=>'405',
            'martial_status.required'=>'400',
            'martial_status.in'=>'405',
            'residence_country_id.required'=>'400',
            'residence_country_id.exists'=>'405',
            'religion_id.required'=>'400',
            'religion_id.exists'=>'405',
            'nationality_id.required'=>'400',
            'nationality_id.exists'=>'405',
            'total_experience.required'=>'400',
            'job_title.required'=>'400',
            'cv.required'=>'400',
        ];
            try{
                $validator = \Validator::make($request->all(), $rules, $messages);
                if($validator->fails()) {
                    return response()->json(['status'=>(int)$validator->errors()->first()]);
                }
        #Start logic
        #check employee

        $employee=Employee::where('apiToken',$request->apiToken)->first();

        $USER=CV::where('employee_id',$employee->id)->first();

        if($USER !== NULL){
            return response()->json(['status'=>410]);
        }     

        $cv=new CV;

        $cv->phone=$request->phone;
         $cv->employee_id=$employee->id;
         $cv->date_of_birth=$request->date_of_birth;
         $cv->martial_status=$request->martial_status;
         $cv->residence_country_id=$request->residence_country_id;
         $cv->religion_id=$request->religion_id;
         $cv->total_experience=$request->total_experience;
         $cv->job_title=$request->job_title;
        $request->note == NULL ? :  $cv->note=$request->note;
         $this->SaveFile($cv,'cv','cv','CV');
         $cv->nationality_id=$request->nationality_id;
         $cv->work_experience=$request->work_experience;
         $cv->created_at=\Carbon\Carbon::now();
         $cv->save();
        
   


    
        return response()->json(['status'=>200]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
            }// end funcrion   



     /**  
    * This api will to update cv to employee
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function update(Request $request){
    /*
        $rules=[
            'apiToken'=>'required|exists:employee,apiToken',
            'phone'  =>'unique:CV,phone,'.$request->apiToken,
            'date_of_birth'=>'date_format:Y-m-d',
            'martial_status'=>'in:0,1',
            'residence_country_id'=>'exists:residence_country,id',
            'religion_id'=>'exists:religion,id',
            'nationality_id'=>'exists:nationality,id',
        ];
        
        $messages=[
            'apiToken.required'=>'400',
            'apiToken.exists'=>'405',
            'phone.unique'=>'405',
            'date_of_birth.date_format'=>'405',
            'martial_status.in'=>'405',
            'residence_country_id.exists'=>'405',
            'religion_id.exists'=>'405',
            'nationality_id.exists'=>'405',

        ];
        */
            try{
                /*
                $validator = \Validator::make($request->all(), $rules, $messages);
                if($validator->fails()) {
                    return response()->json(['status'=>(int)$validator->errors()->first()]);
                }
                */
        #Start logic
        #check employee
        $employee=Employee::where('apiToken',$request->apiToken)->first();
    
        
        $cv=CV::where('employee_id',$employee->id)->first();
        $request->phone ==NULL ? :    $cv->phone=$request->phone;
    
        $request->date_of_birth ==NULL ? :  $cv->date_of_birth=$request->date_of_birth;
        $request->martial_status ==NULL ? :    $cv->martial_status=$request->martial_status;
        $request->residence_country_id ==NULL ? :    $cv->residence_country_id=$request->residence_country_id;
    
        $request->religion_id  ==NULL ? :   $cv->religion_id=$request->religion_id;
        $request->total_experience  ==NULL ? :    $cv->total_experience=$request->total_experience;
        $request->job_title  ==NULL ? :    $cv->job_title=$request->job_title;
        $request->note  ==NULL ? :    $cv->note=$request->note;
            $this->SaveFile($cv,'cv','cv','CV');
        $request->nationality_id  ==NULL ? :    $cv->nationality_id=$request->nationality_id;
        $request->work_experience  ==NULL ? :    $cv->work_experience=$request->work_experience;
            $cv->created_at=\Carbon\Carbon::now();
            $cv->save();


    
        return response()->json(['status'=>200]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
            }// end funcrion            
            
            


    /**  
    * This api will to get cv to employee
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function get(Request $request){
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
        #check employee
        $employee=Employee::where('apiToken',$request->apiToken)->first();
        $cv=CV::where('employee_id',$employee->id)->first();

        if($cv == NULL){
            return response()->json(['status'=>2014]);
        }
        





        return response()->json(['status'=>200,'cv'=>new ResourcesCv($cv)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
            }// end funcrion            
            
            

    /**  
    * This api will to search for  cv to employee
    * 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function search(Request $request){
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
        #check employee
        $employee=Employee::where('apiToken',$request->apiToken)->first();
        $cv=CV::where('employee_id',$employee->id)->first();

        if($cv == NULL){
            return response()->json(['status'=>2014]);
        }
        


   


    
        return response()->json(['status'=>200,'cv'=>Cv::collection($cv)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
            }// end funcrion                  
}


