<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class favEmployee extends JsonResource
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
            'name'=>$this->employee->name,
            'email'=>$this->employee->email,
            'logo'=>isset($this->employee->logo)== NULL ? NULL :$this->employee->logo,
            'language'=>$this->employee->language,
            'cv'=>new CvInfo($this->whenLoaded('cv')) ,
            'job'=>new JobInfo($this->whenLoaded('job')) ,
            'is_cv'=>$this->whenLoaded('cv')== NULL ? 0 :1,
        ];
    }
}
