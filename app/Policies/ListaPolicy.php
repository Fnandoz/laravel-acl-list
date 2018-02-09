<?php

namespace App\Policies;

use App\User;
use App\Lista;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the lista.
     *
     * @param  \App\User  $user
     * @param  \App\Lista  $lista
     * @return mixed
     */
    public function view(User $user, Lista $lista)
    {
        return $user->possuiAcesso(['master', 'read']);
    }

    /**
     * Determine whether the user can create listas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->possuiAcesso(['master', 'create']);
    }

    /**
     * Determine whether the user can update the lista.
     *
     * @param  \App\User  $user
     * @param  \App\Lista  $lista
     * @return mixed
     */
    public function update(User $user, Lista $lista)
    {
        return $user->possuiAcesso(['master', 'update']);
    }

    /**
     * Determine whether the user can delete the lista.
     *
     * @param  \App\User  $user
     * @param  \App\Lista  $lista
     * @return mixed
     */
    public function delete(User $user, Lista $lista)
    {
      return $user->possuiAcesso(['master', 'delete']);
    }


    /**
     * Determine whether the user can use all functions the lista.
     *
     * @param  \App\User  $user
     * @param  \App\Lista  $lista
     * @return mixed
     */
    public function all(User $user)
    {
      return $user->possuiAcesso(['master', 'create', 'read', 'update', 'delete']);
    }


}
