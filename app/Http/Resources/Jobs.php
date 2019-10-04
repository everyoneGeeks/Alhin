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
            'job_title'=>$request->language =='ar' ? $this->job_title_ar :$this->job_title_en,
            'image'=>$this->image,
            'companyName'=>$this->company->name,
            'rate'=>$this->rate->count() == NULL ? '0': $this->rate->sum('rate')/$this->rate->count(),
            'isFav'=>$this->isfav,
            'review'=>$this->view,
        ];
    }
}
