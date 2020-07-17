<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

//authenticate our user 
class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    //a user can have several posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
