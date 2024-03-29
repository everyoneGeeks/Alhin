<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CvInfo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id, 
            'job_title'=>$this->job_title,
            'phone'=>$this->phone,
            'Username'=>$this->employee->name,
            'email'=>$this->employee->email,
            'date_of_birth'=>$this->date_of_birth,
            'nationality'=>new nationality($this->nationality),
            'martial_status'=>$this->martial_status,
            'residence_country'=>new residenceCountry($this->residence_country),
            'religion'=>new religion($this->religion),
            'total_experience'=>$this->total_experience,
            'note'=>$this->note,
            'photo'=>$this->photo,
            "expectedSalary"=>$this->expected_salary,
                 'work_experience_job_title'=>$this->work_experience_job_title,
                'work_experience_company_name'=>$this->work_experience_company_name,
                'work_experience_experirnce_years'=>$this->work_experience_experirnce_years,

            'rate'=>$this->rate->count() == NULL ? '0': $this->rate->sum('rate')/$this->rate->count(),
            'isFav'=>true,//new isFavCv($request,$this->id),
            'review'=>$this->view,

        ];
    }
}
