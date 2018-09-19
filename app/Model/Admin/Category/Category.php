<?php

namespace App\Model\Admin\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function product()
    {
        return $this->hasMany('App\Model\Admin\Product');
    }
}
