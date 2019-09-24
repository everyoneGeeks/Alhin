<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Jobs extends JsonResource
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
            'job_title_ar'=>$this->job_title_ar,
            'job_title_en'=>$this->job_title_en,

            'image'=>$this->image,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'total_experience'=>$this->total_exprience,
            'residence_country'=>new residenceCountry($this->residence_country),
            'company'=>new CompnayJobs($this->company),
        ];
    }
}
