<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;

class ListaController extends Controller
{
    public function index(Request $request)
    {
      $lista = Lista::all();
      return view('lista.index', ['lista'=>$lista]);
    }


    public function novo(Request $request)
    {
      $item = new Lista();
      $item->titulo = $request->titulo;
      $item->save();

      return redirect('/home/lista');
    }


    public function item(Request $request, $id)
    {
      $item = Lista::find($id);
      return view('lista.item', ['item'=>$item]);
    }


    public function atualizar(Request $request, $id)
    {
      $item = Lista::find($id);
      return view('lista.atualizar', ['item'=>$item]);

    }

    public function atualizarItem(Request $request)
    {
      $item = Lista::find($request->id);
      $item->titulo = $request->titulo;
      $item->update();
      return redirect('/home/lista');
    }


    public function apaga(Request $request)
    {
      $item = Lista::find($request->id);
      $item->delete();
      return redirect('/home/lista');
    }
}
