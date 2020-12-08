<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $guarded = [];

    public function thumbnails()
    {
        return $this->hasMany('App\Thumbnail');
    }


    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_product');
    }




    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
