<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Company;
use App\Employee;
use App\favouriteCompany;
use App\favouriteEmployee;

class isFavJob extends JsonResource
{
    public $job;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __construct($resource,$job)
    {
        parent::__construct($resource);
        $this->resource = $resource;
        
        $this->job=$job;

        
    }

    public function toArray($request)
    {
        #companyCheck
        $company=Company::where('apiToken',$request->apiToken)->first();
        
        if($company !== NULL){
            $favouriteCompany=favouriteCompany::where('company_id',$company->id)->where('job_id',$this->job)->first();
            if($favouriteCompany ==NULL ){
                return false;
            }else {
                return true;
            }

        }

        #EmployeeCheck
        $Employee=Employee::where('apiToken',$request->apiToken)->first();
        if($Employee !== NULL){
            $favouriteEmployee=favouriteEmployee::where('employee_id',$Employee->id)->where('job_id',$this->job)->first();
            if($favouriteEmployee ==NULL ){
                return false;
            }else {
                return true;
            }

        }
            
        }
    
}
