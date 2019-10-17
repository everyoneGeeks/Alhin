<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobRate extends Model
{
    protected $table="rate_company";
    public $timestamps = false;
    public function job ()
    {
        return $this->belongsTo('App\Job');
    }


}
