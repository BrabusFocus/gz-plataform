<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\BranchOffice;
use DB;
class CategoryController extends Controller
{

  public function index()
  {
    //$categories = Category::orderBy('name')->paginate(10);
    $categories = DB::table('categories')
        ->join('branch_office_category', function ($join) {
            $join->on('categories.id', '=', 'branch_office_category.category_id');
        })->join('branch_offices', function ($join) {
            $join->on('branch_offices.id', '=', 'branch_office_category.branch_office_id') ->where('branch_offices.user_id', '=',auth()->user()->id);
        })->select('categories.*')->paginate(10);
      
    return view('admin.categories.index')->with(compact('categories'));
  }

  /**
  * Mostar Formulario de Registro Productos
  */
  public function create()
  {
    $branch = BranchOffice::all();
    return view('admin.categories.create')->with(compact('branch'));
  }

  /**
  * Almacenar el nuevo Producto en la BD
  */
  public function store(Request $request)
  {
    /**
    * Los mensajes y las reglas de valdiad ahora son propiedades del modelo
    * So propiedad publicas y staticas
    */
    $this->validate($request,Category::$rules,Category::$messages);
    /**
    * flash data
    */
    $notitication = 'Categoría creada exitosamente ';

    /**
    * Registrar un nuevo producto en l BD
    */
    /**
    * $request->all() Para recoger todos los datos que envia el formario,
    * el usar only en vez de all, solo se toman los que se definen dentro el metodo
    */
    $category = Category::create($request->only('name','description','image'));//asignacion masiva (declar atributo en el modelo)
    /**
    * Si en el request viene una imagen (con input name -> image)
    *Almacenarla en la ruta X
    */


    if ($request->hasFile('image')) {
      /**
      * Guardar la imagen en nuestro proyecto
      */
      $file = $request->file('image');
      $path = public_path().'/images/categories';
      $filename = uniqid().'-'.$file->getClientOriginalName();
      /**
      * Nombre con id unico mas - guion y nombre original de la imagen
      */
      $moved = $file->move($path,$filename);//Guardar en proyecto
      /**
      * Update de la categoria
      */
      if ($moved) {
        $category->image = $filename;
        $category->save();
      }

    }
    //Porteriormente redirecionar
    return  redirect('/admin/categories');
  }

  /**
  * Mostar Formulario de editar Productos
  */
  public function edit($id)
  {
    $category = Category::find($id);
    return view('admin.categories.edit')->with(compact('category'));
  }

  /**
  * Editar el nuevo Producto en la BD
  */
  public function update(Request $request,Category $category)
  {
    /**
    * los mensajes y las reglas de valdiad ahora son propiedades del modelo
    */
    $this->validate($request,Category::$rules,Category::$messages);

    /**
    * Actualizar category en l BD
    */
    $category->update($request->only('name','description'));//datos masivo
    if ($request->hasFile('image')) {
      /**
      * Guardar la imagen en nuestro proyecto
      */
      $file = $request->file('image');
      $path = public_path().'/images/categories';
      $filename = uniqid().'-'.$file->getClientOriginalName();
      /**
      * Nombre con id unico mas - guion y nombre original de la imagen
      */
      $moved = $file->move($path,$filename);//Guardar en proyecto
      /**
      * Update de la categoria
      */
      if ($moved) {
        $previousPath = $path .'/'.$category->image;
        $category->image = $filename;
        $saved = $category->save();//update
        /**
        * Eliminar imagenes, solo si se usa un servidor de archivos para almacenar images
        * no se eliminar de forma fisica, solamente eliminacion logica.
        */
        // si la imagen  nueva se guardo exitosamente, eliminar la anterior.
        if ($saved) {
          File::delete($previousPath);
        }

      }

    }
    //Porteriormente redirecionar
    return  redirect('/admin/categories');
  }
  /**
  * Eliminar el nuevo Producto en la BD
  */
  public function delete(Category $category)
  {
    /**
    * Eliminar un nuevo producto en l BD
    */
    $category->delete();//Eliminar
    //Porteriormente redirecionar
    return  back();//Redirecion a la pagina anterios ( en la qe se encontraba el usuario)
  }



  public function assed()
  {
    # code...
  }


}
