<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\ProductImage;
use App\Laboratory;
use App\User;
use DB;
class ProductController extends Controller
{
  public function index()
  {
    $id = auth()->user()->id;
    $products = DB::table('products')
        ->join('categories as cat', function ($join) {
            $join->on('products.category_id', '=', 'cat.id');
        })->join('branch_office_category', function ($join) {
            $join->on('cat.id', '=', 'branch_office_category.category_id');
        })->join('branch_offices as branch', function ($join) {
            $join->on('branch.id', '=', 'branch_office_category.branch_office_id') ->where('branch.user_id', '=',auth()->user()->id);
        })->select('products.*', 'cat.id as idcat', 'branch.id as idbanch')->paginate(10);
    //$products = Product::paginate(10);
    return view('admin.products.index')->with(compact('products'));
  }
  /**
  * Mostar Formulario de Registro Productos
  */
  public function create()
  {
    $categories = Category::orderBy('name')->get();
    $laboratories =  Laboratory::orderBy('name')->get();
    return view('admin.products.create')->with(compact('categories','laboratories'));
  }

  /**
  * Almacenar el nuevo Producto en la BD
  */
  public function store(Request $request)
  {
    /**
    * Valiar Datos
    */
    $messages =[
      'name.required' => 'Es necesario ingresar un nombre para el producto',
      'name.min' => 'El producto debe tener al menos 3 caracteres',
      'tradename.required' => 'La descripción corta  es un campo obligatorio',
      'presentation.required' => 'Es necesario que ingrese la presentacion del producto',
      'concentration.required' => 'El campo Concentracion   es un campo obligatorio',
      'components.required' => 'EL componentes  es un campo obligatorio',
      'components.max'=> 'El campo componentes  solo admite hasta 250 caracteres',
      'description.required' => 'La descripción   es un campo obligatorio',
      'description.max'=> 'La descripción  solo admite hasta 250 caracteres'
    ];
    $rules = [
      'name' => 'required|min:3',
      'tradename'  => 'required',
      'presentation'  =>  'requiIlluminate\Support\Collection Object
(
    [items:protected] => Array
        (
        )
red|max:200',
      'concentration'  =>  'required|max:200',
      'components'  =>  'required|max:250',
      'description'  =>  'required|max:250'
    ];
    $this->validate($request,$rules,$messages);


    /**
    * Registrar un nuevo producto en l BD
    */
    $product = new Product();
    $product->name = $request->input('name');
    $product->tradename = $request->input('tradename');
    $product->presentation = $request->input('presentation');
    $product->concentration = $request->input('concentration');
    $product->price = $request->input('price');
    if ($request->input('laboratory_id') == 0) {
      $product->laboratory_id = null;
    }else {
      $product->laboratory_id = $request->input('laboratory_id');
    }

    $product->components = $request->input('components');
    $product->description = $request->input('description');
    if ($request->input('category_id') == 0) {
      $product->category_id = null;
    }else{
      $product->category_id = $request->input('category_id');
    }
    $product->save();//Insert en la tabla producto
    //Porteriormente redirecionar
    return  redirect('/admin/products/');
  }

  /**
  * Mostar Formulario de editar Productos
  */
  public function edit($id)
  {
    $categories = Category::orderBy('name')->get();
    $product = Product::find($id);
    dd($product);
    return view('admin.products.edit')->with(compact('product','categories'));
  }

  /**
  * Editar el nuevo Producto en la BD
  */
  public function update(Request $request,$id)
  {
    /**
    * Valiar Datos
    */
    $messages =[
      'name.required' => 'Es necesario ingresar un nombre para el producto',
      'name.min' => 'El producto debe tener al menos 3 caracteres',
      'tradename.required' => 'La descripción corta  es un campo obligatorio',
      'presentation.required' => 'Es necesario que ingrese la presentacion del producto',
      'concentration.required' => 'El campo Concentracion   es un campo obligatorio',
      // 'description.required' => 'La descripción   es un campo obligatorio',
      // 'description.max'=> 'La descripción  solo admite hasta 500 caracteres'
    ];
    $rules = [
      'name' => 'required|min:3',
      'tradename'  => 'required',
      'presentation'  =>  'required|max:200',
      'concentration'  =>  'required|max:200',
      // 'description'  =>  'required|max:500'
    ];
    $this->validate($request,$rules,$messages);

    /**
    * Registrar un nuevo producto en l BD
    */
    //dd($request->all());
    $product = Product::find($id);
    $product->name = $request->input('name');
    $product->tradename = $request->input('tradename');
    $product->presentation = $request->input('presentation');
    $product->concentration = $request->input('concentration');
    $product->laboratory_id = 1;
    // $product->description = $request->input('description');
    // $product->price = $request->input('price');


    if ($request->input('category_id') == 0) {
      $product->category_id = null;
    }else{
      $product->category_id = $request->input('category_id');
    }

    $product->save();//Actualizar en la tabla producto
    //Porteriormente redirecionar
    return  redirect('/admin/products');
  }
  /**
  * Eliminar el nuevo Producto en la BD
  */
  public function delete($id)
  {
    /**
    * Registrar un nuevo producto en l BD
    */
    ProductImage::where('product_id',$id)->delete();
    $product = Product::find($id);
    $product->delete();//Eliminar en la tabla producto
    //Porteriormente redirecionar
    return  back();//Redirecion a la pagina anterios ( en la qe se encontraba el usuario)
  }

  public function show(Products $product)
  {
    // $product = Product::find($id);
    // dd($product);
    return view('admin.products.index')->with(compact('product'));


  }

}
