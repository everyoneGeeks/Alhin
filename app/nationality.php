<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class nationality extends Model
{
    use SoftDeletes;
    protected $table="nationality";
    public $timestamps = false;
    
}
