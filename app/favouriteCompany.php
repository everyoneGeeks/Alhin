<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favouriteCompany extends Model
{
    protected $table="favourite_company";
    public $timestamps = false;

    public function job(){
        return $this->belongsTo('App\Job','job_id');
    }

    public function company (){
        return $this->belongsTo('App\Company','company_id');
    }

    public function cv(){
        return $this->belongsTo('App\CV','cv_id');
    }    
}

