<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = [ 'box_id','ballsInBox','colorsInBox' ];

    public function balls()
    {
      return $this->hasMany('App\Ball');
    }

}
