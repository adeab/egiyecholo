<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function seopost(){
        return $this->hasMany('App\SeoPost');
    }
    public function tagpost(){
        return $this->hasMany('App\TagPost');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
