<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function update(User $currentUser, User $user){
        return $currentUser->id === $user->id;



        //update 方法接收两个参数，第一个参数默认为当前登录用户实例，
        //第二个参数则为要进行授权的用户实例。当两个 id 相同时，则代表两个用户是相同用户，
        //用户通过授权，可以接着进行下一个操作。如果 id 不相同的话，将抛出 403 异常信息来拒绝访问。

        //我们并不需要检查 $currentUser 是不是 NULL。未登录用户，框架会自动为其 所有权限 返回 false
    }

    public function destroy(User $currentUser, User $user){
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }

    // 自己不能关注自己
    public function follow(User $currentUser, User $user){
        return $currentUser->id !== $user->id;
    }

}
