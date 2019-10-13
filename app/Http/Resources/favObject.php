<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class favObject extends JsonResource
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
            'name'=>$this->company->name,
            'email'=>$this->company->email,
            'logo'=>isset($this->company->logo)== NULL ? NULL :$this->company->logo,
            'language'=>$this->company->language,
            'cv'=>new CvInfo($this->whenLoaded('cv')) ,
            'job'=>new JobInfo($this->whenLoaded('job')) ,
            'is_cv'=>$this->whenLoaded('cv')== NULL ? 0 :1,
        ];
    }
}
