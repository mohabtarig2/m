<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipality extends Model
{
    protected $table = "municipality";
    protected $fillable = ['id','user_id','path'];
}
