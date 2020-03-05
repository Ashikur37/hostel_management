<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
    protected $fillable = [
        'id','student_id', 'name', 'department','phone','day'
    ];
}
