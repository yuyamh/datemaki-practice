<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        // ユーザー本人かつ、ゲストユーザーでないならば、アクセス可能
        return \Auth::id() == $user->id && $user->role !== 'guest';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        // ユーザー本人かつ、ゲストユーザーでないならば、アクセス可能
        return \Auth::id() == $user->id && $user->role !== 'guest';
    }
}
