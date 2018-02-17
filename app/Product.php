<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\ProductImage;
use App\Laboratory;
class Product extends Model
{
    //Relaciones
    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function  images()
    {
      /**
       * Un producto o esto tiene muchas imaganes
       */
      return $this->hasMany(ProductImage::class);
    }

    public function laboratory()
    {
      return $this->belongsTo('App\Laboratory');
    }
    /**
     * Campo calculado
     */
    public function getFeaturedImageUrlAttribute()
    {
      /**
       * Obtener la primera (o una) imagen destacada de los productos ( donde el campo destacado sea true)
       * Si no tiene una imagen descatada,  obtener la primera imagen (campo destacado false)
       * Si el campo tiene una imagen asignada retornar la url de decha imagen  (url es campo calulado del modelo ProductImage)
       * Si el producto no tiene imagenes asingadas retornar URL de imagen por defecto.
       */
      $featuredImage = $this->images()->where('featured',true)->first();
      if (!$featuredImage) {
         $featuredImage = $this->images()->first();
      }
      if ($featuredImage) {
        return $featuredImage->url;
      }
      /**
       * Imagenes por defecto
       */
      return '/images/products/default.png';

    }

    /**
     * Scope
     */

     public function scopeName($query, $name)
     {
       /**
        * DB::raw(CONCAT)
        */
       if (trim($name != "")) {
          $query->where('name','like',"%$name%");
       }
     }
     public function scopeType($query, $name)
     {
       /**
        * DB::raw(CONCAT)
        */
       if (trim($name != "")) {
          $query->where('name','like',"%$name%");
       }
     }
}
