<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Regras;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function regras()
    {
      return $this->belongsToMany(Regras::class);
    }

    public function possuiAcesso($regras)
    {
      if (is_array($regras)) {
        return false !== $this->regras()->whereIn('titulo', $regras)->first();
      }else{
        return false !== $this->regras()->where('titulo', $regras)->first();
      }
    }

    /**
       * Apaga todas as regras atribuidas ao usuário
       */
       public function apagaRegras()
       {
         DB::table('regras_user')->where('user_id', '=', $this->id)->delete();
       }

}
