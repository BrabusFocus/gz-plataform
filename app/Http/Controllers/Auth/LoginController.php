<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/home';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  /**
  * (Vendor) Este metodo se registribe para lograr iniciar session con el campo username y no con el
  * email que viene por defecto
  */
  public function username()
  {
    return 'username';
  }
  /**
  * Redirigimos al usuario a lo que estaba viendo antes de logearse
  */
  // public function redirectTo()
  // {
  //   /**
  //   * con pull('redirect_to'); obtenemos el valor de la variable y eliminamos su existencia
  //   */
  //   if (session()->has('redirect_to')) {
  //     return session()->pull('redirect_to');
  //   }
  //   return $this->redirectTo;
  // }
  /**
  * Redigir por rol
  */
  public function redirectPath()
  {
    if (auth()->user()->admin && auth()->user()->affiliate) {
      return '/admin';
    }
    return '/home';
  }
}
