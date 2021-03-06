<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function images(){
    return $this->hasMany(Image::class);
  }
  public function downloads(){
    return $this->belongsToMany(Download::class , 'category_download');
  }
}
