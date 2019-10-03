<?php

namespace App\Http\Controllers\Api;

use App\CV;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Cv as ResourcesCv;
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
        'martial_status' => 'required|in:0,1',
        'residence_country_id' => 'required|exists:residence_country,id',
        'religion_id' => 'required|exists:religion,id',
        'nationality_id' => 'required|exists:nationality,id',
        'total_experience' => 'required',
        'cv' => 'required',
        'job_title' => 'required',
        'work_experience.*' => 'nullable',
        'work_experience.*.job_title' => 'required',
        'work_experience.*.company_name' => 'required',
        'work_experience.*.experirnce_years' => 'required',

    ];

    public $messages = [
        'apiToken.required' => '400',
        'apiToken.exists' => '405',
        'phone.required' => '400',
        'phone.unique' => '405',
        'date_of_birth.required' => '400',
        'date_of_birth.date_format' => '405',
        'martial_status.required' => '400',
        'martial_status.in' => '405',
        'residence_country_id.required' => '400',
        'residence_country_id.exists' => '405',
        'religion_id.required' => '400',
        'religion_id.exists' => '405',
        'nationality_id.required' => '400',
        'nationality_id.exists' => '405',
        'total_experience.required' => '400',
        'job_title.required' => '400',
        'cv.required' => '400',
        'work_experience.*.job_title.required' => '400',
        'work_experience.*.company_name.required' => '400',
        'work_experience.*.experirnce_years.required' => '400',

    ];
    /**
     * This api will to add new cv to employee
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function add(Request $request)
    {

        try {
            $validator = \Validator::make($request->all(), $this->rules, $this->messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic
            #check employee

            $employee = Employee::where('apiToken', $request->apiToken)->first();

            $USER = CV::where('employee_id', $employee->id)->first();

            if ($USER !== null) {
                return response()->json(['status' => 410]);
            }

            $cv = new CV;
            #checkIFNote NULL
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
            $this->SaveFile($cv, 'cv', 'cv', 'CV');
            $cv->nationality_id = $request->nationality_id;
            $cv->work_experience = $request->work_experience;
            $cv->created_at = \Carbon\Carbon::now();
            $cv->save();

            return response()->json(['status' => 200]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
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
        #check employee
        $employee = Employee::where('apiToken', $request->apiToken)->first();
        #custom Validation to make Updat request
        $this->rules['phone'] = [
            Rule::unique('CV')->ignore($employee->id, 'employee_id')];

        $this->rules['date_of_birth'] = 'date_format:Y-m-d';

        $this->rules['martial_status'] = 'in:0,1';
        $this->rules['residence_country_id'] = 'exists:residence_country,id';
        $this->rules['religion_id'] = 'exists:religion,id';
        $this->rules['nationality_id'] = 'exists:nationality,id';
        $this->rules['total_experience'] = 'nullable';
        $this->rules['cv'] = 'nullable';
        $this->rules['job_title'] = 'nullable';
        $this->rules['work_experience.*'] = 'nullable';
        $this->rules['work_experience.*.job_title'] = 'nullable';
        $this->rules['work_experience.*.company_name'] = 'nullable';
        $this->rules['work_experience.*.experirnce_years'] = 'nullable';
        try {

            $validator = \Validator::make($request->all(), $this->rules, $this->messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }

            #Start logic

            $cv = CV::where('employee_id', $employee->id)->first();
            $request->phone == null ?: $cv->phone = $request->phone;
            $request->expectedSalary ==NULL ? :$cv->expected_salary=$request->expectedSalary ;
            $request->date_of_birth == null ?: $cv->date_of_birth = $request->date_of_birth;
            $request->martial_status == null ?: $cv->martial_status = $request->martial_status;
            $request->residence_country_id == null ?: $cv->residence_country_id = $request->residence_country_id;
            $request->religion_id == null ?: $cv->religion_id = $request->religion_id;
            $request->total_experience == null ?: $cv->total_experience = $request->total_experience;
            $request->job_title == null ?: $cv->job_title = $request->job_title;
            $request->note == null ?: $cv->note = $request->note;
            $this->SaveFile($cv, 'cv', 'cv', 'CV');
            $request->nationality_id == null ?: $cv->nationality_id = $request->nationality_id;
            $request->work_experience == null ?: $cv->work_experience = $request->work_experience;
            $cv->created_at = \Carbon\Carbon::now();
            $cv->save();

            if(request()->hasFile('cv')){
                $History=new History();
                $History->employee_id=$cv->employee_id;
                $History->cv=$cv->cv;
                $History->save();
            }
            return response()->json(['status' => 200]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
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
            'apiToken.required' => '400',
            'apiToken.exists' => '405',
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic
            #check employee
            $employee = Employee::where('apiToken', $request->apiToken)->first();
            $request->language=$employee->language;
            $cv = CV::where('employee_id', $employee->id)->first();

            if ($cv == null) {
                return response()->json(['status' => 204]);
            }


            return response()->json(['status' => 200, 'cv' => new ResourcesCv($cv)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
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
            'martial_status' => 'in:1,0',
            "residence_country_id"=>"exists:residence_country,id",
            'most_resent'=>"in:1,0",
        ];

        $messages = [
            'residence_country_id.required' => '400',
            'martial_status.in' => '405',
            'most_resent.in' => '405',
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
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
                return response()->json(['status' => 204]);
            }

            return response()->json(['status' => 200, 'cv' =>  ResourcesCv::collection($cv)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion
}
