<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/plans', 'WelcomeController@plans');
Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');
/**
 * uso de AJax
 */
Route::get('/home/search', 'HomeController@search');
Route::get('/home/json/{op}/{query}',[
  'as' => 'json',
  'uses' =>  'HomeController@searcdinamic',
]);
/**
 * Rutas para el admin
 * Se ha definido el grupo de rutas para que pasan por el filtro de los middleware auth (para validar si se ha inicado session)
 * y proceder con el middle admin para validar el tipo de usuario ( debe ser admin).
 * Se ha agregado el metodo prefix('admin') para evitar escribir por cada ruta de este grupo Route::get('/admin/products', 'ProductController@index');
 * Al usar el metodo namespace('Admin') se evita escribit Admin\ por cada ruta Route::get('/products', 'Admin\ProductController@index');
 */
 /**
  * ['auth','admin'] y ->prefix('admin') al crear el middleware
  */
 // Route::namespace('Admin')->prefix('admin')->group(function () {
  Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
   Route::get('/', 'AdminController@index');
   Route::get('/perfil', 'AdminController@index');
   Route::post('/perfil', 'AdminController@store');
   Route::get('/change', 'AdminController@reset');
   /**
    * Sucursal
    */
    Route::get('/branch', 'BranchController@index');//Listado
    Route::get('/branch/create', 'BranchController@create');//Muestra el formulario para crear branch
    Route::post('/branch', 'BranchController@store');//almacenar datos del branch
    Route::get('/branch/{branch}/edit', 'BranchController@edit');//Muestra el formulario para editar branch
    Route::post('/branch/{branch}/edit', 'BranchController@update');//Actualizar datos del branch
    Route::delete('/branch/{id}', 'BranchController@delete');//Actualizar datos del branch
    Route::post('/branch/associatte', 'BranchController@associatte');
   /**
    * Productos
    */
   Route::get('/products', 'ProductController@index');//Listado
   Route::get('/products/create', 'ProductController@create');//Muestra el formulario para crear producto
   Route::post('/products', 'ProductController@store');//almacenar datos del producto
   Route::get('/products/{id}/edit', 'ProductController@edit');//Muestra el formulario para editar producto
   Route::post('/products/{id}/edit', 'ProductController@update');//Actualizar datos del producto
   Route::delete('/products/{id}', 'ProductController@delete');//Actualizar datos del producto
   Route::get('/products/show/{products}', 'ProductController@show');
   Route::get('/products/{id}/images', 'ProductImageController@index');//Listar imagenes Por id De Producto
   Route::post('/products/{id}/images', 'ProductImageController@store');//Registrar
   Route::delete('/products/{id}/images', 'ProductImageController@destroy');//Registrar
   Route::get('/products/{id}/images/select/{image}', 'ProductImageController@select');//Destacar imagenes

   /**
   * Rutas para la gestion de Categorias
   */
   Route::get('/categories', 'CategoryController@index');//Listado
   Route::get('/categories/create', 'CategoryController@create');//Muestra el formulario para crear producto
   Route::post('/categories', 'CategoryController@store');//almacenar datos del producto
   Route::get('/categories/{id}/edit', 'CategoryController@edit');//Muestra el formulario para editar producto
   Route::post('/categories/{category}/edit', 'CategoryController@update');//Actualizar datos del producto
   Route::delete('/categories/{category}', 'CategoryController@delete');//Actualizar datos del producto
 });
/**
 * Rutas para el cliente
 */
