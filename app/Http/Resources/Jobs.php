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
            'job_title'=>$this->job_title,
            'companyName'=>$this->companyName,
            'image'=>$this->image,
            'rate'=>$this->rate->count() == NULL ? '0': $this->rate->sum('rate')/$this->rate->count(),
            'isFav'=>new isFavJob($request,$this->id),
            'review'=>$this->view,
            "salary"=>$this->salary,
            'total_experience'=>$this->total_exprience,
        ];
    }
}
