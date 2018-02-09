<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;
use Illuminate\Support\Facades\DB;

class ListaController extends Controller
{
    public function index(Request $request)
    {
      $lista = Lista::all();
      return view('lista.index', ['lista'=>$lista, 'mensagem'=>'']);
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

    public function busca(Request $request)
    {
      $lista =  DB::table('listas')->where('titulo', 'like', '%'.$request->termo.'%')->get();//Lista::where('titulo', $request->termo);
      if (strlen($request->termo)>0) {
        return view('lista.index', ['lista'=>$lista, 'mensagem'=>'Buscando pelo termo "'.$request->termo."\""]);
      }
      return view('lista.index', ['lista'=>$lista, 'mensagem'=>'']);
    }
}
