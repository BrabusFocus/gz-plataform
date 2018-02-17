<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Laboratory extends Model
{
    public function product()
    {
      return $this->hasMany('App\Product');
    }
}
