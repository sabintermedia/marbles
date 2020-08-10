<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ball extends Model
{
    protected $fillable = [ 'ball_id', 'color', 'box_id' ];

    public function box()
    {
      return $this->belongsTo('App\Box');
    }
}
