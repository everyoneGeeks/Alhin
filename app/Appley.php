<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appley extends Model
{
    protected $table="applyed";
    public $timestamps = false;

    public function employee ()
    {
        return $this->belongsTo('App\Employee','employee_id');
    }

    public function job ()
    {
        return $this->belongsTo('App\Job','job_id');
    }
}
