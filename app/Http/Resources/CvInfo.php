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
            'phone'=>$this->phone,
            'job_title'=>$this->job_title,
            'date_of_birth'=>$this->date_of_birth,
            'nationality'=>new nationality($this->nationality),
            'martial_status'=>$this->martial_status,
            'residence_country'=>new residenceCountry($this->residence_country),
            'religion'=>new religion($this->religion),
            'total_experience'=>$this->total_experience,
            'note'=>$this->note,
            'cv'=>$this->cv,
            "expectedSalary"=>$this->expected_salary,
            'workExperience'=>new workExperience(json_decode($this->work_experience)),
            'rate'=>$this->rate,
            'isFav'=>$this->isfav,
            'review'=>$this->review,

        ];
    }
}
