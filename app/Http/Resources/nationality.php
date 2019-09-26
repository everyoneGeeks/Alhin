<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class nationality extends JsonResource
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
            "nationality"=> $request->language =='ar' ? $this->nationality_ar :$this->nationality_en, 
        ];
    }
}
