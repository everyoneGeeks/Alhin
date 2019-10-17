<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table="job";
    public $timestamps = false;



    public function company ()
    {
        return $this->belongsTo('App\Company','company_id');
    }

    public function residence_country ()
    {
        return $this->belongsTo('App\residenceCountry','residence_country_id');
    }
    public function rate ()
    {
        return $this->hasMany('App\jobRate','job_id');
    }

    public function jobName ()
    {
        return $this->belongsTo('App\JobsName','job_title');
    }
}
