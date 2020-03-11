<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ["room_id","seat_no"];
    public function room()
{
    return $this->belongsTo('App\Room');
}
}
