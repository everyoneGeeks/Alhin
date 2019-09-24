<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favouriteCompany extends Model
{
    protected $table="favourite_company";
    public $timestamps = false;

    public function company (){
        return $this->belongsTo('App\Company','company_id');
    }

    public function employee (){
        return $this->belongsTo('App\Employee','employee_id');
    }    
}

