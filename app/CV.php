<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table="CV";
    public $timestamps = false;
    
    public function nationality()
    {
        return $this->belongsTo('App\nationality','nationality_id')->withTrashed();
    }

    public function employee ()
    {
        return $this->belongsTo('App\Employee','employee_id');
    }

    public function residence_country ()
    {
        return $this->belongsTo('App\residenceCountry','residence_country_id');
    }

    public function religion ()
    {
        return $this->belongsTo('App\religion','religion_id');
    }



    public function rate ()
    {
        return $this->hasMany('App\cvRate','cv_id');
    }
    
}
