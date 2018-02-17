<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      /**
       * Agregar los nuevos campos en el fillabel del modelo user
       */

        $validar = Validator::make($data,User::$rules,User::$messages, [
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone'=> 'required',
            'celphone'=> 'nullable',
            'nit'=> 'required|string|max:18',
            'address'=> 'required',
            'rol' => 'required',
            'gender'=> 'nullable',
            'dui' => 'nullable|string|max:10',
            'nrm' => 'nullable',
            'specialty' => 'nullable',
        ]);
        return $validar;
    }

  /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'] ?: '',
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'celphone' => $data['celphone'] ?: '23123',
            'nit' => $data['nit'],
            'address' => $data['address'],
            'rol' => $data['rol'],
            'gender'=> $data['gender'],
            'dui' => $data['dui'],
            'nrm' => $data['nrm'],
            'specialty' => $data['specialty'],
        ]);
    }
}
