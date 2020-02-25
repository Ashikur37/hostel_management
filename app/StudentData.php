<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    protected $fillable = ['student_id','phone','name','department','semester','batch','gender'];
}
