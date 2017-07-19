<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Content extends Model
{
  public $translatedAttributes = ['title', 'body'];

  public function images(){
    return $this->hasMany(Image::class);
  }
}
