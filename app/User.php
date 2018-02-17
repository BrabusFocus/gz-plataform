<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\BranchOffice;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password','phone','celphone','nit','address','rol','gender','dui','nrm','specialty',
    ];

    /**
    * Valiar Datos
    */
    public static $messages =[
      'name.required' => 'Es necesario ingresar un nombre  completo',
      'name.min' => 'Escriba su nombre completo',
      'username.required' => 'Es necesario ingresar un Username',
      'email.required' => 'El correo electronico  es un campo obligatorio',
      'address.required'=> 'Debe escribir una direccion',
      'nit.required'=> 'El NIT es un campo obligatorio',
      'rol.required'=> 'El tipo  es un campo obligatorio'
    ];
    public static $rules = [
      'name' => 'required|min:3',
      'username'  =>  'required',
      'email'  =>  'required',
      'address'  =>  'required',
      'nit'  =>  'required',
      'rol'  =>  'required',
    ];
    /**
     * Relacion de modelo
     *        Usuario - branch-offices (surcualaes)
     */

     public function BranchOffice()
    {
      return  $this->hasMany(BranchOffice::class);
    }

     public function getAdminAttribute()
    {
      if (auth()->user()->rol == 0 || auth()->user()->rol == 1 ) {
        return true;
      }
      return false;
    }
     public function getAffiliateAttribute()
    {
      if (auth()->user()->rol == 1 ) {
        return true;
      }
      return false;
    }

    public function getPremiumAttribute()
   {
     if (auth()->user()->rol == 3) {
       return true;
     }
     return false;
   }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
