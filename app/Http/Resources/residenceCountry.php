<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class residenceCountry extends JsonResource
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
            "country"=>$request->language =='ar' ? $this->country_ar :$this->country_en,
        ];
    }
}
