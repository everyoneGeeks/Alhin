<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobInfo extends JsonResource
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
            'companyName'=>$this->companyName,
            'image'=>$this->image,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'total_experience'=>$this->total_exprience,
            'residence_country'=>new residenceCountry($this->residence_country),
            'company'=>[
                'id'=>$this->company->id,
                'name'=>$this->company->name,
                'email'=>$this->company->email,
                'logo'=>isset($this->company->logo)== NULL ? NULL :$this->company->logo,
                'language'=>$this->company->language,
            ],
            'rate'=>$this->rate->count() == NULL ? 0: $this->rate->sum('rate')/$this->rate->count(),
            'isFav'=>new isFavJob($request,$this->id),
            'review'=>$this->view,
            "salary"=>$this->salary
        ];
    }
}
