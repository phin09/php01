<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false; // eloquent의 timestamp 자동 입력 기능을 끔
    protected $fillable = ['email', 'password']; // 사용자 입력을 허용할 whitelist
    // blacklist는 $guarded 사용
}

