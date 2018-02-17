<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
class ProductController extends Controller
{
  //
  public function show($id)
  {
    // $id = auth()->user()->id;
    $product = Product::find($id);
    $images = $product->images;// images asociadas al producto

    $imagesLeft = collect();
    $imagesRight = collect();

    foreach ($images as $key => $image) {

      if ($key%2==0) {
        $imagesLeft->push($image);
      } else {
        $imagesRight->push($image);
      }

    }
    return view('products.index')->with(compact('product','imagesLeft','imagesRight'));
  }
}
