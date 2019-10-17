<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class employeeId extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date=1;
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'logo'=>isset($this->logo)== NULL ? NULL :$this->logo,
            'language'=>$this->language,
            'cv'=>$this->cv ==NULL ? $date=0:new CvInfo($this->whenLoaded('cv')) ,
            'job'=>new JobInfo($this->whenLoaded('job')),
            'is_cv'=>$date
        ];
    }
}
