<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public function getImage()
    {
    	if($this->image == null)
    	{
    		return '/img/no-image.png';
    	}
    	return '/uploads/' . $this->image;
    }
}
