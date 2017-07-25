<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
	protected $table = 'navigations';

    public function parent() {

        return $this->hasOne(Navigation::class, 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany( Navigation::class, 'parent_id', 'id');

    }  

    public static function tree() {

        return static::with(implode('.', array_fill(0, 10, 'children')))->where('parent_id', '=', '0')->get();

    }
}
