<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class employee extends JsonResource
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
            'name'=>$this->name,
            'email'=>$this->email,
            'logo'=>isset($this->logo)== NULL ? NULL :$this->logo,
            'language'=>$this->language,
            'cv'=>new CvInfo($this->cv),
            'is_employee'=>1
        ];
    }
}
