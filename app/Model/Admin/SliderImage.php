<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    public function getImageAttribute($value)
    {
      return asset('admin/sliderimages/'.$value);
    }
}
