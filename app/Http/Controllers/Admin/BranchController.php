<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BranchOffice;
use App\Category;
use DB;
class BranchController extends Controller
{
  public function index()
  {
    $id = auth()->user()->id;
    $branch = BranchOffice::where('user_id',$id)->get();
    // $categories = Category::all();

    return view('admin.branch.index')->with(compact('branch','categories'));
  }

  public function create()
  {
    // $categories = Category::all();
    $categories = DB::table('categories')
        ->join('branch_office_category', function ($join) {
            $join->on('categories.id', '=', 'branch_office_category.category_id');
        })->join('branch_offices', function ($join) {
            $join->on('branch_offices.id', '=', 'branch_office_category.branch_office_id') ->where('branch_offices.user_id', '=',auth()->user()->id);
        })
        ->get();
    return view('admin.branch.create')->with(compact('categories'));
  }

  public function store(Request $request)
  {
    /**
    * Los mensajes y las reglas de valdiad ahora son propiedades del modelo
    * So propiedad publicas y staticas
    */
    $this->validate($request,BranchOffice::$rules,BranchOffice::$messages);
    /**
    * flash data
    */
    $notitication = 'Sucursal creada exitosamente ';

    /**
    * Registrar un nuevo producto en l BD
    */
    /**
    * $request->all() Para recoger todos los datos que envia el formario,
    * el usar only en vez de all, solo se toman los que se definen dentro el metodo
    */
    $user_id = auth()->user()->id;
    BranchOffice::create($request->only('name','phone','desription','user_id'));//asignacion masiva (declar atributo en el modelo)

    return  redirect('/admin/branch');
  }
  public function edit(BranchOffice $branch)
  {
    //  $rs = $branch->where('user_id',auth()->user()->id);
    // if($rs)
    //   return back();
    return view('admin.branch.edit')->with(compact('branch'));
  }

  public function update(Request $request,BranchOffice $branch)
  {
    $this->validate($request,BranchOffice::$rules,BranchOffice::$messages);

    $branch->update($request->only('name','phone','desription'));

    return  redirect('/admin/branch');
  }

    public function associatte(Request $request)
    {
      $branch = BranchOffice::find($request->input('branch_office_id'));
      $branch->categories()->attach($request->input('category_id'));
      return back();
    }

}
