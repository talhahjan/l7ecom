<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded=[];


public function categories(){
    return $this->hasMany('App\category')->where('parent_id', '=', 0);
}

    public function subCategories()
    {
        return $this->hasMany('App\category')->where('parent_id', '>', 0);
    }



}
