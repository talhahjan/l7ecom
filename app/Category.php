<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo('App\Category');
    }


    public function section()
    {
        return $this->belongsTo('App\Section');
    }
    public function childs()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }
}
