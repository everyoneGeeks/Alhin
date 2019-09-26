<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Setting extends JsonResource
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
            'about_us'=>$request->language =='ar' ? $this->about_us_ar :$this->about_us_en,
            'terms_conditions'=>$request->language =='ar' ? $this->terms_conditions_ar :$this->terms_conditions_en,
        ];
    }
}
