<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cvs extends JsonResource
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
            'employeeName'=>$this->employee->name,
            'photo'=>$this->photo,
            'rate'=>$this->rate->count() == NULL ? '0': $this->rate->sum('rate')/$this->rate->count(),
            'isFav'=>$this->isfav,
            'review'=>$this->view,
        ];
    }
}
