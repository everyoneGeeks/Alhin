<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table="employee";

    public function cv()
    {
        return $this->hasOne('App\CV');
    }



}
