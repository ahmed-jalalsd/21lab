<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Image extends Model
{
  public $translatedAttributes = ['gallery_title','gallery_caption', 'slider_title', 'slider_caption'];

  public function categories(){
    return $this->belongsTo(Category::class, 'category_id');
  }

  public function contents(){
    return $this->belongsTo(Content::class, 'content_id');
  }

  public function downloads(){
    return $this->belongsTo(Download::class, 'download_id');
  }

  public function posts(){
    return $this->belongsTo(Post::class, 'post_id');
  }
}
