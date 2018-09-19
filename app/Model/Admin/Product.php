<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getPictureAttribute($value)
    {
      return asset('admin/products/'.$value);
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Admin\Category\Category');
    }
}
