<?php

namespace App;
use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
  //
  protected $fillable = ['name','phone','desription','user_id'];

  public static $messages =[
    'name.required' => 'Es necesario ingresar un nombre para la Sucursal',
    'name.min' => 'El nombre de la Sucursal debe tener al menos 5 caracteres',
    'phone.required' => 'EL numero de Telefono es obligatorio',
    'desription.required' => 'La descripción  es un campo obligatorio',
    'desription.max'=> 'La descripción corta solo admite hasta 50 caracteres'
  ];
  public static $rules = [
    'name' => 'required|min:3',
    'desription'  =>  'required|max:50'
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function categories()
  {
    // return $this->belongsToMany('App\Category','branch_office_category')->withPivot('branch_office_id','branch_office_id')->withTimestamps();
    return $this->belongsToMany('App\Category','branch_office_category')->withTimestamps();
  }
}
