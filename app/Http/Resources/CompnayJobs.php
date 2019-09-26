<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompnayJobs extends JsonResource
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
            'apiToken'=>$this->apiToken,
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'logo'=>isset($this->logo)== NULL ? NULL :$this->logo,
            'language'=>$this->language,
        ];
    }
}
