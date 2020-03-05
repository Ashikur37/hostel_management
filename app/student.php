<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public function application(){
        return $this->hasOne(Application::class, 'id','application_id');
        }
}
