<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   
    public function tagpost(){
        return $this->hasMany('App\TagPost');
    }
}
