<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Regras;

class UserController extends Controller
{
    public function index(Request $request)
    {
      $usuarios = User::all();
      return view('usuario.index', ['usuarios'=>$usuarios]);
    }

    public function novo(Request $request)
    {
      $regras = Regras::all();
      return view('usuario.novo', ['regras'=>$regras]);
    }

    public function novoUsuario(Request $request)
    {
      $user = new User();
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();

      foreach ($request->regras as $regra) {
        $user->regras->atach(Regras::find($regra));
      }
      return redirect('/home/usuario');
    }

    public function usuario(Request $request, $id)
    {
        $usuario = User::find($id);
        return view('usuario.usuario', ["usuario"=>$usuario]);
    }

    public function atualizar(Request $request, $id)
    {
      $usuario = User::find($id);
      $regras = Regras::all();
      return view('usuario.atualizar', ["usuario"=>$usuario, "regras"=>$regras]);
    }

    public function atualizarUsuario(Request $request)
    {
      $usuario = User::find($request->id);
      $usuario->name = $request->nome;
      $usuario->email = $request->email;
      $usuario->password = bcrypt($request->password);
      $usuario->save();
      $usuario->apagaRegras();
      if(count($request->regras) > 0){
         foreach ($request->regras as $regra) {
           $usuario->regras()->attach(Regras::where('id', '=', $regra)->first());
         }
       }
      return redirect('/home/usuario');
    }

    public function apaga(Request $request)
    {
      $usuario = User::find($request->id);
      $usuario->delete();
      return redirect('/home/usuario');
    }
}
