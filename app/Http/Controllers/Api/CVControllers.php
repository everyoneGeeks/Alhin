<?php

namespace App\Http\Controllers\Api;

use App\CV;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CvInfo as ResourcesCv;
use App\Http\Resources\Cvs as ResourcesCvs;
use Illuminate\Validation\Rule;
use App\History;

/*
|--------------------------------------------------------------------------
| CVControllers
|--------------------------------------------------------------------------
| this will handle all CV part
| R
 */
/**
_______      __
/ ____\ \    / /
| |     \ \  / /
| |      \ \/ /
| |____   \  /
\_____|   \/

 */
class CVControllers extends Controller
{

    public $rules = [
        'apiToken' => 'required|exists:employee,apiToken',
        'phone' => 'required|unique:CV,phone',
        'date_of_birth' => 'required|date_format:Y-m-d',
        'martial_status' => 'required|in:Single,Widowed,Married',
        'residence_country_id' => 'required|exists:residence_country,id',
        'religion_id' => 'required|exists:religion,id',
        'nationality_id' => 'required|exists:nationality,id',
        'total_experience' => 'required',
        'photo' => 'required',
        'job_title' => 'required',
        'work_experience_job_title' => 'required',
        'work_experience_company_name' => 'required',
        'work_experience_experirnce_years' => 'required',

    ];


    /**
     * This api will to add new cv to employee
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function add(Request $request)
    {
     $messages = [

            'apiToken.required' => $this->errorMessage[400]['en'],
            'apiToken.exists' => $this->errorMessage[405]['en'],
            
            'phone.required' => $this->errorMessage[400]['en'],
            'phone.unique' => $this->errorMessage[405]['en'],
            'date_of_birth.required' => $this->errorMessage[400]['en'],
            'date_of_birth.date_format' => $this->errorMessage[405]['en'],
            'martial_status.required' => $this->errorMessage[400]['en'],
            'martial_status.in' => $this->errorMessage[405]['en'],
            'residence_country_id.required' => $this->errorMessage[400]['en'],
            'residence_country_id.exists' =>  $this->errorMessage[405]['en'],
            'religion_id.required' =>  $this->errorMessage[400]['en'],
            'religion_id.exists' => $this->errorMessage[405]['en'],
            'nationality_id.required' => $this->errorMessage[400]['en'],
            'nationality_id.exists' =>  $this->errorMessage[405]['en'],
            'total_experience.required' => $this->errorMessage[400]['en'],
            'job_title.required' =>  $this->errorMessage[400]['en'],
            'photo.required' =>  $this->errorMessage[400]['en'],
            'work_experience_job_title.required' =>  $this->errorMessage[400]['en'],
            'work_experience_company_name.required' =>  $this->errorMessage[400]['en'],
            'work_experience_experirnce_years.required' =>  $this->errorMessage[400]['en'],
        ];
        try {
            $validator = \Validator::make($request->all(), $this->rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->errors()->first()]);
            }
            #Start logic
            #check employee

            $employee = Employee::where('apiToken', $request->apiToken)->first();

            $USER = CV::where('employee_id', $employee->id)->first();
            if ($USER !== null) {
                return response()->json(['message' =>  $this->errorMessage[430][$employee->language]]);
            }

            $cv = new CV;
            #checkIFNote & expectedSalary NULL
            if ($request->note !== null) {$cv->note = $request->note;}
            if ($request->expectedSalary !== null) {$cv->expected_salary = $request->expectedSalary;}

            $cv->phone = $request->phone;
            $cv->employee_id = $employee->id;
            $cv->date_of_birth = $request->date_of_birth;
            $cv->martial_status = $request->martial_status;
            $cv->residence_country_id = $request->residence_country_id;
            $cv->religion_id = $request->religion_id;
            $cv->total_experience = $request->total_experience;
            $cv->job_title = $request->job_title;
            $this->SaveFile($cv, 'photo', 'photo', 'photo');
            $cv->nationality_id = $request->nationality_id;
            $cv->work_experience_job_title =  $request->work_experience_job_title;
            $cv->work_experience_company_name =  $request->work_experience_company_name;
            $cv->work_experience_experirnce_years =  $request->work_experience_experirnce_years;
            $cv->created_at = \Carbon\Carbon::now();
            $cv->save();

            return response()->json(['message' => $this->errorMessage[200][$employee->language]]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$employee->language]]);
        }
    } // end funcrion

    /**
     * This api will to update cv to employee
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function update(Request $request)
    {
     $messages = [

            'apiToken.required' => $this->errorMessage[400]['en'],
    
            'apiToken.exists' => $this->errorMessage[405]['en'],
            'phone.required' => $this->errorMessage[400]['en'],
            'phone.unique' => $this->errorMessage[405]['en'],
            'date_of_birth.required' => $this->errorMessage[400]['en'],
            'date_of_birth.date_format' => $this->errorMessage[405]['en'],
            'martial_status.required' => $this->errorMessage[400]['en'],
            'martial_status.in' => $this->errorMessage[405]['en'],
            'residence_country_id.required' => $this->errorMessage[400]['en'],
            'residence_country_id.exists' =>  $this->errorMessage[405]['en'],
            'religion_id.required' =>  $this->errorMessage[400]['en'],
            'religion_id.exists' => $this->errorMessage[405]['en'],
            'nationality_id.required' => $this->errorMessage[400]['en'],
            'nationality_id.exists' =>  $this->errorMessage[405]['en'],
            'total_experience.required' => $this->errorMessage[400]['en'],
            'job_title.required' =>  $this->errorMessage[400]['en'],
            'photo.required' =>  $this->errorMessage[400]['en'],
            'work_experience_job_title.required' =>  $this->errorMessage[400]['en'],
            'work_experience_company_name.required' =>  $this->errorMessage[400]['en'],
            'work_experience_experirnce_years.required' =>  $this->errorMessage[400]['en'],
        ];
        #check employee
        $employee = Employee::where('apiToken', $request->apiToken)->first();

        #custom Validation to make Updat request
        $this->rules['phone'] = [
            Rule::unique('CV')->ignore($employee->id, 'employee_id')];

        $this->rules['date_of_birth'] = 'date_format:Y-m-d';

        $this->rules['martial_status'] = 'in:Single,Widowed,Married';
        $this->rules['residence_country_id'] = 'exists:residence_country,id';
        $this->rules['religion_id'] = 'exists:religion,id';
        $this->rules['nationality_id'] = 'exists:nationality,id';
        $this->rules['total_experience'] = 'nullable';
        $this->rules['photo'] = 'nullable';
        $this->rules['job_title'] = 'nullable';
        $this->rules['work_experience_job_title'] = 'nullable';
        $this->rules['work_experience_company_name'] = 'nullable';
        $this->rules['work_experience_experirnce_years'] = 'nullable';
        try {

            $validator = \Validator::make($request->all(), $this->rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->errors()->first()]);
            }

            #Start logic

            $cv = CV::where('employee_id',$employee->id)->first();
          
            if($cv == NULL){
               return response()->json(['message'=>$this->errorMessage[405][$employee->language]]);
           }
            $request->phone == NULL ?: $cv->phone = $request->phone;
            $request->expectedSalary ==NULL ? :$cv->expected_salary=$request->expectedSalary ;
            $request->date_of_birth == null ?: $cv->date_of_birth = $request->date_of_birth;
            $request->martial_status == null ?: $cv->martial_status = $request->martial_status;
            $request->residence_country_id == null ?: $cv->residence_country_id = $request->residence_country_id;
            $request->religion_id == null ?: $cv->religion_id = $request->religion_id;
            $request->total_experience == null ?: $cv->total_experience = $request->total_experience;
            $request->job_title == null ?: $cv->job_title = $request->job_title;
            $request->note == null ?: $cv->note = $request->note;
            $this->SaveFile($cv, 'photo', 'photo', 'photo');
            $request->nationality_id == null ?: $cv->nationality_id = $request->nationality_id;
            $request->work_experience_job_title == null ?: $cv->work_experience_job_title =  $request->work_experience_job_title;
            $request->work_experience_company_name == null ?: $cv->work_experience_company_name =  $request->work_experience_company_name;
            $request->work_experience_experirnce_years == null ?: $cv->work_experience_experirnce_years =  $request->work_experience_experirnce_years;
            $cv->created_at = \Carbon\Carbon::now();
            $cv->save();

            return response()->json(['message' => $this->errorMessage[200][$employee->language]]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$employee->language]]);
        }
    } // end funcrion

    /**
     * This api will to get cv to employee
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function get(Request $request)
    {
        $rules = [
            'apiToken' => 'required|exists:employee,apiToken',
        ];

        $messages = [
            'apiToken.required' =>$this->errorMessage[400]['en'] ,
            'apiToken.exists' => $this->errorMessage[405]['en'],
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->errors()->first()]);
            }
            #Start logic
            #check employee
            $employee = Employee::where('apiToken', $request->apiToken)->first();
            $request->language=$employee->language;
            $cv = CV::where('employee_id', $employee->id)->first();

            if ($cv == null) {
                return response()->json(['message' => $this->errorMessage[204][$request->language]]);
            }


            return response()->json(['message' => $this->errorMessage[200][$request->language], 'cv' => new ResourcesCv($cv)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$request->language]]);
        }
    } // end funcrion

    /**
     * This api will to search for  cv to employee
     *
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function search(Request $request)
    {
        $rules = [
            'martial_status' => 'in:Single,Widowed,Married',
            "residence_country_id"=>"exists:residence_country,id",
            'most_resent'=>"in:1,0",
        ];

        $messages = [
            'residence_country_id.required' => $this->errorMessage[400]['en'],
            'martial_status.in' => $this->errorMessage[405]['en'],
            'most_resent.in' =>$this->errorMessage[405]['en'],
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()]);
            }
            #Start logic
            #search when you send (martial_status,residence_country_id,total_experience,job_title)

            if($request->martial_status || $request->residence_country_id || $request->total_experience  || $request->job_title  ){
                
                $cv = CV::where('martial_status',$request->martial_status)
                ->orWhere('residence_country_id',$request->residence_country_id)
                ->orWhere('total_experience',$request->total_experience)
                ->orWhere('job_title',$request->job_title)         
                ->get();

            }else{
                if($request->most_resent == 1){
                $cv = CV::OrderBy('created_at','desc')->get();
                }

                if($request->most_resent == 0){
                    $cv = CV::OrderBy('created_at','asc')->get();
                    }
            }


            if ($cv->isEmpty()) {
                return response()->json(['message' => $this->errorMessage[204]['en']]);
            }

            return response()->json(['message' => $this->errorMessage[200]['en'], 'cv' =>  ResourcesCvs::collection($cv)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404]['en']]);
        }
    } // end funcrion






    /**
     * This api will to get cv info 
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function Info(Request $request)
    {
        $rules = [
            'cvId' => 'required|exists:CV,id',
            'language'=>'required|in:ar,en'
        ];

        $messages = [
            'cvId.required' => $this->errorMessage[400][$request->language],
            'cvId.exists' => $this->errorMessage[405][$request->language],
            'language.required' =>$this->errorMessage[400][$request->language],
            'language.in' =>$this->errorMessage[405][$request->language],
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()]);
            }
            #Start logic
            #check employee


            
            $cv = CV::where('id', $request->cvId)->first();

            if ($cv == null) {
                return response()->json(['message' => $this->errorMessage[204][$request->language]]);
            }


            return response()->json(['message' => $this->errorMessage[200][$request->language], 'cv' => new ResourcesCv($cv)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$request->language]]);
        }
    } // end funcrion

}
