<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

//authenticate our user 
class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
}
