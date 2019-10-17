<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeoPost extends Model
{
    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function seokeyword(){
        return $this->belongsTo('App\SeoKeyword');
    }
}
