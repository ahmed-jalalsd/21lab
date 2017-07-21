<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
  protected $fillable = ['download_media'];
  public function images(){
    return $this->hasMany(Image::class);
  }
  public function categories(){
    return $this->belongsToMany(Category::class , 'category_download');
  }
}
