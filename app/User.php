<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// user model과 migration은 기본적으로 포함되어 있다.
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
     *
     * 조회 쿼리(App\User::get())에서 제외할 column.
     * App\User::find(1)->password 이런 식으로 직접 접근은 가능.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
