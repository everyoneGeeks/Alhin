<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table="company";

    public function job ()
    {
        return $this->hasMany('App\Job');
    }


    public function rate ()
    {
        return $this->belongsTo('App\companyRate');
    }



}
