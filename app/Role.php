<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function auther()
    {
    	return $this->hasMany(User::class,'user_id');
    }
}
