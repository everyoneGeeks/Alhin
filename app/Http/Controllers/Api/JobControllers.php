<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Jobs as ResourcesJobs;
use App\Job;
use App\Company;

/*
|--------------------------------------------------------------------------
| JobControllers
|--------------------------------------------------------------------------
| this will handle all Jobs part
| R
 */
/**
 _       _     
(_)     | |    
 _  ___ | |__  
| |/ _ \| '_ \ 
| | (_) | |_) |
| |\___/|_.__/ 
_/ |            
|__/  
 */
class JobControllers extends Controller
{
    public $rules = [
        'apiToken' => 'required|exists:company,apiToken',
        'job_title_ar' => 'required',
        'job_title_en' => 'required',
        'image' => 'required|image',
        'phone' => 'required',
        'email' => 'required|email',
        'residence_country_id' => 'required|exists:residence_country,id',
        'total_exprience' => 'required',

    ];

    public $messages = [
        'apiToken.required' => '400',
        'apiToken.exists' => '405',
        'job_title_ar.required' => '400',
        'job_title_en.required' => '400',
        'image.required' => '400',
        'image.image' => '405',
        'residence_country_id.required' => '400',
        'residence_country_id.exists' => '405',
        'phone.required' => '400',
        'email.required' => '400',
        'email.email' => '405',
        'total_exprience.required' => '400',
    ];
    /**
     * This api will to add new job to company
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
            #check company

            $company = company::where('apiToken', $request->apiToken)->first();

            $cv = new Job;
            $cv->phone = $request->phone;
            $cv->company_id = $company->id;
            $cv->residence_country_id = $request->residence_country_id;
            $cv->total_exprience = $request->total_exprience;
            $cv->job_title_ar = $request->job_title_ar;
            $cv->job_title_en = $request->job_title_en;
            $this->SaveFile($cv, 'image', 'image', 'image');
            $cv->email = $request->email;
            $cv->created_at = \Carbon\Carbon::now();
            $cv->save();

            return response()->json(['status' => 200]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

 

    /**
     * This api will to update  job to company
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function update(Request $request)
    {
        #custom Validation to make Updat request
        $this->rules['martial_status'] = 'in:0,1';
        $this->rules['residence_country_id'] = 'exists:residence_country,id';
        $this->rules['total_exprience'] = 'nullable';
        $this->rules['image'] = 'nullable';
        $this->rules['job_title_ar'] = 'nullable';
        $this->rules['job_title_en'] = 'nullable';
        $this->rules['phone'] = 'nullable';
        $this->rules['email'] = 'nullable';
        $this->rules['jobId']='required|exists:job,id';
        $this->messages['jobId.required']='400';
        $this->messages['jobId.exists']='405';

        try {

            $validator = \Validator::make($request->all(), $this->rules, $this->messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }

            #Start logic
            #check company
            $company = company::where('apiToken', $request->apiToken)->first();
            $company = Job::where('id', $request->jobId)->first();

            $request->total_exprience == null ?: $company->total_exprience =$request->total_exprience; 
            $request->phone == null ?: $company->phone = $request->phone;
            $request->email == null ?: $company->email = $request->email;    
            $request->martial_status == null ?: $company->martial_status = $request->martial_status;
            $request->residence_country_id == null ?: $company->residence_country_id = $request->residence_country_id;
            $request->job_title_ar == null ?: $company->job_title_ar = $request->job_title_ar;
            $request->job_title_en == null ?: $company->job_title_en = $request->job_title_en;
            $this->SaveFile($company, 'image', 'image', 'image');
            $request->nationality_id == null ?: $company->nationality_id = $request->nationality_id;
            $request->work_experience == null ?: $company->work_experience = $request->work_experience;
            $company->created_at = \Carbon\Carbon::now();
            $company->save();

            return response()->json(['status' => 200]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

    /**
     * This api will to get  job to company
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function get(Request $request)
    {
        $rules = [
            'apiToken' => 'required|exists:company,apiToken',
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
            $company = company::where('apiToken', $request->apiToken)->first();

            $jobs = Job::where('company_id', $company->id)->get();

            if ($jobs->isEmpty()) {
                return response()->json(['status' => 204]);
            }


            return response()->json(['status' => 200, 'jobs' => ResourcesJobs::collection($jobs)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

    /**
     *This api will to search for  job to company
     *
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function search(Request $request)
    {
        $rules = [
            "residence_country_id"=>"exists:residence_country,id",
            'most_resent'=>"in:1,0",
        ];

        $messages = [
            'residence_country_id.required' => '400',
            'most_resent.in' => '405',
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic
            #search when you send (residence_country_id,total_experience,job_title)

            if($request->residence_country_id || $request->total_experience  || $request->job_title  ){
                
                $Job = Job::where(function ($q) use ($request){
                    if($request->job_title){
                        $q->where('job_title_ar','LIKE','%'.$request->job_title.'%')->orWhere('job_title_en','LIKE','%'.$request->job_title.'%');
                    }
                    if($request->residence_country_id){
                        $Job->Where('residence_country_id',$request->residence_country_id);
                    }
                    if($request->total_experience){
                        $Job->Where('total_exprience',$request->total_experience);
                    }
                    $q->get();
                })->get();

            }else{
                if($request->most_resent == 1){
                $Job = Job::OrderBy('created_at','desc')->get();
                }

                if($request->most_resent == 0){
                    $Job = Job::OrderBy('created_at','asc')->get();
                    }
            }


            if ($Job->isEmpty() ) {
                return response()->json(['status' => 204]);
            }

            return response()->json(['status' => 200, 'Jobs' =>  ResourcesJobs::collection($Job)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion    
}
