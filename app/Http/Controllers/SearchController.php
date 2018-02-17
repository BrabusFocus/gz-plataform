<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class SearchController extends Controller
{
  public function show(Request $request)
  {
    $query = $request->input('query');

    $products = Product::where('name','like',"%$query%")->orderBy('price', 'asc')->paginate(5);
    // if ($products->count() == 0) {
    //     $products = Product::where('tradename','like',"%$query%")->orderBy('price', 'asc')->paginate(5) ;
    // }
    /**
    * Si el resultado de la busqueda es 1 (escribe todo el nomnbre del producto)
    * Se redireccionara ala pagina del producto, si no se muestra la pagina de resultados
    */

    // if ($products->count() == 1) {
    //   $id = $products->first()->id;
    //   return redirect("/products/$id");
    //
    //   /*Usar las comillas dobles y poner una varianle dentro equilave a usar las comillas simples
    //   y concanetar manualmente 'products'.$id
    //   */
    // }
    return view('search.index')->with(compact('products','query'));

  }


  public function data()
  {
    $products = Product::pluck('name');//obtener el nombre de los productos

    return $products;
  }
}
