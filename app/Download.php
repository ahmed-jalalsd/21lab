<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
  public function images(){
    return $this->hasMany(Image::class);
  }
  public function categories(){
    return $this->belongsToMany(Product::class , 'category_download');
  }
}
