<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favouriteEmployee extends Model
{
    protected $table="favourite_employee";
    public $timestamps = false;

    public function company (){
        return $this->belongsTo('App\Company','company_id');
    }

    public function job (){
        return $this->belongsTo('App\Job','job_id');
    }  
}
