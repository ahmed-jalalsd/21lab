<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  public function images(){
    return $this->hasMany(Image::class);
  }
}
