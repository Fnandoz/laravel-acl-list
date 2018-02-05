<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function index(Request $request)
    {
      # code...
    }


    public function novo(Request $request)
    {
      if($request->method=='post'){

      }else {
        # code...
      }
    }


    public function item(Request $request, $id)
    {
      # code...
    }


    public function atualizar(Request $request, $id)
    {
      if($request->method=='post'){

      }else {
        # code...
      }
    }


    public function apaga(Request $request)
    {
      # code...
    }
}
