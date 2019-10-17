<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeoKeyword extends Model
{
    public function seopost(){
        return $this->hasMany('App\SeoPost');
    }
}
