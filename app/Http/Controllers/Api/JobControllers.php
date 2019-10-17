<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Jobs as ResourcesJobs;
use App\Http\Resources\JobInfo as ResourcesJobInfo;
use App\Http\Resources\JobsName as ResourcesJobsName;


use App\Job;
use App\JobsName;
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
        'job_title' => 'required|exists:jobs_name,id',
        'image' => 'required|image',
        'phone' => 'required',
        'email' => 'required|email',
        'residence_country_id' => 'required|exists:residence_country,id',
        'total_exprience' => 'required',
        'companyName'=>'required',

    ];


    /**
     * This api will to add new job to company
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function add(Request $request)
    {
         $messages = [
            'apiToken.required' => $this->errorMessage[400][$request->language],
            'apiToken.exists' => $this->errorMessage[405][$request->language],
            'job_title.exists' => $this->errorMessage[405][$request->language],
            'job_title.required' => $this->errorMessage[400][$request->language],
            'image.required' => $this->errorMessage[400][$request->language],
            'image.image' => $this->errorMessage[405][$request->language],
            'companyName.required'=>$this->errorMessage[400][$request->language],
            'residence_country_id.required' =>$this->errorMessage[400][$request->language],
            'residence_country_id.exists' =>$this->errorMessage[405][$request->language],
            'phone.required' => $this->errorMessage[400][$request->language],
            'email.required' => $this->errorMessage[400][$request->language],
            'email.email' => $this->errorMessage[405][$request->language],
            'total_exprience.required' =>$this->errorMessage[400][$request->language] ,
        ];
        try {
            $validator = \Validator::make($request->all(), $this->rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()]);
            }
            #Start logic
            #check company

            $company = company::where('apiToken', $request->apiToken)->first();

            $job = new Job;
            $job->phone = $request->phone;
            $job->company_id = $company->id;
            $job->residence_country_id = $request->residence_country_id;
            $job->total_exprience = $request->total_exprience;
            $job->job_title = $request->job_title;
            $job->companyName=$request->companyName;
            $request->salary == NULL  ?  :$job->salary = $request->salary;
            $this->SaveFile($job, 'image', 'image', 'image');
            $job->email = $request->email;
            $job->created_at = \Carbon\Carbon::now();
            $job->save();

            return response()->json(['message' => $this->errorMessage[200][$request->language]]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$request->language]]);
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
     $messages = [
            'apiToken.required' => $this->errorMessage[400][$request->language],
            'apiToken.exists' => $this->errorMessage[405][$request->language],
            'job_title.exists' => $this->errorMessage[405][$request->language],
            'job_title.required' => $this->errorMessage[400][$request->language],
            'image.required' => $this->errorMessage[400][$request->language],
            'image.image' => $this->errorMessage[405][$request->language],
            'companyName.required'=>$this->errorMessage[400][$request->language],
            'residence_country_id.required' =>$this->errorMessage[400][$request->language],
            'residence_country_id.exists' =>$this->errorMessage[405][$request->language],
            'phone.required' => $this->errorMessage[400][$request->language],
            'email.required' => $this->errorMessage[400][$request->language],
            'email.email' => $this->errorMessage[405][$request->language],
            'total_exprience.required' =>$this->errorMessage[400][$request->language] ,
        ];
        #custom Validation to make Updat request
        $this->rules['martial_status'] = 'in:0,1';
        $this->rules['residence_country_id'] = 'exists:residence_country,id';
        $this->rules['total_exprience'] = 'nullable';
        $this->rules['image'] = 'nullable';
        $this->rules['job_title'] = 'nullable';
        $this->rules['phone'] = 'nullable';
        $this->rules['email'] = 'nullable';
        $this->rules['jobId']='required|exists:job,id';
        $this->messages['jobId.required']=$this->errorMessage[400][$request->language];
        $this->messages['jobId.exists']=$this->errorMessage[405][$request->language];

        try {

            $validator = \Validator::make($request->all(), $this->rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->errors()->first()]);
            }

            #Start logic
            #check company
            $company = company::where('apiToken', $request->apiToken)->first();

            $job = Job::where('id', $request->jobId)->first();
            $request->salary == NULL  ?  :$job->salary = $request->salary;
            $request->total_exprience == null ?: $job->total_exprience =$request->total_exprience; 
            $request->phone == null ?: $job->phone = $request->phone;
            $request->email == null ?: $job->email = $request->email;    
            $request->martial_status == null ?: $job->martial_status = $request->martial_status;
            $request->residence_country_id == null ?: $job->residence_country_id = $request->residence_country_id;
            $request->job_title == null ?: $job->job_title = $request->job_title;
            $request->companyName == NULL ? : $job->companyName=$request->companyName;
            $this->SaveFile($job, 'image', 'image', 'image');
            $request->nationality_id == null ?: $job->nationality_id = $request->nationality_id;
            $request->work_experience == null ?: $job->work_experience = $request->work_experience;
            $job->created_at = \Carbon\Carbon::now();

            $job->save();

            return response()->json(['message' => $this->errorMessage[200][$request->language]]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$request->language]]);
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
            'apiToken.required' => $this->errorMessage[400][$request->language],
            'apiToken.exists' =>   $this->errorMessage[405][$request->language],
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->errors()->first()]);
            }
            #Start logic
            #check employee
            $company = company::where('apiToken', $request->apiToken)->first();
            $request->language=$company->language;
            $jobs = Job::where('company_id', $company->id)->get();

            if ($jobs->isEmpty()) {
                return response()->json(['message' => $this->errorMessage[204][$request->language]]);
            }


            return response()->json(['message' => $this->errorMessage[200][$request->language], 'jobs' => ResourcesJobs::collection($jobs)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$request->language]]);
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
            'residence_country_id.required' => $this->errorMessage[400][$request->language],
            'most_resent.in' => $this->errorMessage[405][$request->language],
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->errors()->first()]);
            }
            #Start logic
            #search when you send (residence_country_id,total_experience,job_title)

            if($request->residence_country_id || $request->total_experience  || $request->job_title  ){
                
                $Job = Job::where(function ($q) use ($request){
                    if($request->job_title){
                        $q->where('job_title','LIKE','%'.$request->job_title.'%')->orWhere('job_title','LIKE','%'.$request->job_title.'%');
                    }
                    if($request->residence_country_id){
                        $q->Where('residence_country_id',$request->residence_country_id);
                    }
                    if($request->total_experience){
                        $q->Where('total_exprience',$request->total_experience);
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
                return response()->json(['message' => $this->errorMessage[204][$request->language]]);
            }

            return response()->json(['message' => $this->errorMessage[200][$request->language], 'Jobs' =>  ResourcesJobs::collection($Job)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$request->language]]);
        }
    } // end funcrion    




   /**
     * This api will to get  job info 
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function info(Request $request)
    {
        $rules = [
            'jobId' => 'required|exists:job,id',
            'language'=>'required|in:ar,en'
        ];

        $messages = [
            'jobId.required' => $this->errorMessage[400][$request->language],
            'jobId.exists' => $this->errorMessage[405][$request->language],
            'language.required' => $this->errorMessage[400][$request->language],
            'language.id' => $this->errorMessage[405][$request->language],
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()]);
            }
            #Start logic

            $job = Job::where('id',$request->jobId)->first();

            if ($job ==NULL) {
                return response()->json(['message' => $this->errorMessage[204][$request->language]]);
            }


            return response()->json(['message' => $this->errorMessage[200][$request->language], 'jobs' => new ResourcesJobInfo($job)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$request->language]]);
        }
    } // end funcrion    




   /**
     * This api will to get jobsName
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function jobsName(Request $request)
    {
        $rules = [
            'language'=>'required|in:ar,en'
        ];

        $messages = [
            'language.required' => $this->errorMessage[400][$request->language],
            'language.id' => $this->errorMessage[405][$request->language],
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()]);
            }

            if($request->language == 'ar'){
            $jobsName = JobsName::select('id','name_ar as name')->get();
        }else{
            $jobsName = JobsName::select('id','name_en as name')->get();
        }
            if ($jobsName->isEmpty()) {
                return response()->json(['message' => $this->errorMessage[204][$request->language]]);
            }


            return response()->json(['message' => $this->errorMessage[200][$request->language], 'jobsName' => new ResourcesJobsName($jobsName)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$request->language]]);
        }
    } // end funcrion    

    
}
