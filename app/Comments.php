<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function auther()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
    public function allow()
    {
    	$this->status = 1;
    	$this->save();
    }
    public function disallow()
    {
    	$this->status = 0;
    	$this->save();
    }
    public function toggleStatus()
    {
    	if($this->status == 0){
    		return $this->allow();
    	}
    	return $this->disallow();
    }
}
