<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Company;
use App\Employee;
use App\favouriteCompany;
use App\favouriteEmployee;

class isFavCv extends JsonResource
{
    public $cv;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __construct($resource,$cv)
    {
        parent::__construct($resource);
        $this->resource = $resource;
        
        $this->cv=$cv;

        
    }

    public function toArray($request)
    {
        #companyCheck
        $company=Company::where('apiToken',$request->apiToken)->first();
        
        if($company !== NULL){
            $favouriteCompany=favouriteCompany::where('company_id',$company->id)->where('cv_id',$this->cv)->first();
            if($favouriteCompany ==NULL ){
                return false;
            }else {
                return true;
            }

        }

        #EmployeeCheck
        $Employee=Employee::where('apiToken',$request->apiToken)->first();
        if($Employee !== NULL){
            $favouriteEmployee=favouriteEmployee::where('employee_id',$Employee->id)->where('cv_id',$this->cv)->first();
            if($favouriteEmployee ==NULL ){
                return false;
            }else {
                return true;
            }

        }
            
        }
    
}
