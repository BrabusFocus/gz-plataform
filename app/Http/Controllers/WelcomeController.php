<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
      /**
       * Extraer solo la categorias que tiene productos asignados
       * El metodo busca una relacion (hace un join )
       */
      // $categories = Category::has('products')->get();//traer todas
      // return view('welcome')->with(compact('categories'));
      return view('welcome');
    }

    public function plans()
    {
      return view('plans.plans');
    }
}
