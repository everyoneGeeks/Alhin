<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class favEmployee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return new EmployeCV($this->employee);
    }
}
