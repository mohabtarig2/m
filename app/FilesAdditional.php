<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilesAdditional extends Model
{
    protected $table ="filesadditional";

    protected $fillable = ['id','path','user_id','updated_at','created_at'];
}
