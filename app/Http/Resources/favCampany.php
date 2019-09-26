<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class favCampany extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return new Jobs($this->job);
    }
}
