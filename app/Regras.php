<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Regras extends Model
{
    protected $fillable = ['titulo', 'descricao'];

    public function user()
    {
      return $this->belongsToMany(User::class);
    }

    public function possuiAcesso($permissoes) : bool
    {
      foreach ($permissoes as $permissao) {
           if ($this->possuiPermissao($permissao))
               return true;
       }
       return false;
    }

    public function possuiPermissao($permissao) : bool
    {
      return $this->permissions[$permission] ?? false;
    }
}
