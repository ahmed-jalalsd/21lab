<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Category extends Model
{
  public $translatedAttributes = ['category_name'];

  public function images(){
    return $this->hasMany(Image::class);
  }
  public function downloads(){
    return $this->belongsToMany(Product::class , 'category_download');
  }
}
