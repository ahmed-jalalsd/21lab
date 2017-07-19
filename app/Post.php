<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Post extends Model
{
  public $translatedAttributes = ['title', 'body', 'blockquote'];
  public function images(){
    return $this->hasMany(Image::class);
  }
}
