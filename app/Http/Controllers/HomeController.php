<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {

    $products = Product::name($request->input('query'))->paginate(10);
    return view('home')->with(compact('products'));
  }

  public function search(Request $request)
  {
    // $products = Product::paginate(10);

    // if ($request->ajax()) {
    $data = " ";
    // $query = $request->get('query');
    $products = DB::table('products')
    ->join('categories as cat', function ($join) {
      $join->on('products.category_id', '=', 'cat.id');
    })->join('branch_office_category', function ($join) {
      $join->on('cat.id', '=', 'cat.id');
    })->join('branch_offices as banch', function ($join) {
      $join->on('banch.id', '=', 'branch_office_category.branch_office_id'); //->where('products.name','like',"%$query%");
    })->select('products.*', 'cat.name as namecat', 'banch.name as nameb')->get();
    // }
    return json_encode($products);
  }

  public function searcdinamic(Request $request,$op,$query= null)
  {

    // dd($op.''.$query);

    // $products = Product::paginate(10);

    if ($request->ajax()) {
      $products = " ";
      // $query = $request->get('query');
      switch ($op) {
        case 0:
        if ($query == 'test') {
          $products = DB::table('products')->select('products.*')->get();
        }else{
          $products = DB::table('products')->select('products.*')->where('products.name','like',"%$query%")->get();//buscar por nombre Generico
        }

        break;
        case 1:
        if ($query == 'test') {
          $products = DB::table('products')->select('products.*')->get();
        }else{
          $products = DB::table('products')->select('products.*')->where('products.tradename','like',"%$query%")->get();//buscar por nombre comercial
        }
        break;

        case 2:
        if ($query == 'test') {
          $products = DB::table('products')->select('products.*')->get();
        }else{
          $products = DB::table('products')->select('products.*')->where('products.components','like',"%$query%")->get();// por componente
        }
        break;
        case 3:
        if ($query == 'test') {
          $products = DB::table('products')->select('products.*')->get();
        }else{
          $products = DB::table('products')->join('laboratories as lab', function ($join) {
            $join->on('lab.id', '=', 'products.laboratory_id');//Busacar por lab
          })->select('products.*', 'lab.name as labname')->where('lab.name','like',"%$query%")->get();
        }

        break;
        default:
        $products = DB::table('products')->select('products.*')->get();
        break;
      }

      return json_encode($products);
    }
  }
}
