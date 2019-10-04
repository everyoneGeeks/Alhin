<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cvRate extends Model
{
    protected $table="rate_employee";

    public function company ()
    {
        return $this->belongsTo('App\Employee');
    }
}
