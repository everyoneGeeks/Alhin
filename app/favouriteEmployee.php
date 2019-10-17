<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favouriteEmployee extends Model
{
    protected $table="favourite_employee";
    public $timestamps = false;

    public function job(){
        return $this->belongsTo('App\Job','job_id');
    }

    public function employee (){
        return $this->belongsTo('App\Employee','employee_id');
    }

    public function cv(){
        return $this->belongsTo('App\CV','cv_id');
    }  
}
