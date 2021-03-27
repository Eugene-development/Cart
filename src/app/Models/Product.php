<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $table = 'prod_product';

//    public function category()
//    {
//        return $this->belongsTo(Category::class);
//    }
//
//    public function action()
//    {
//        return $this->belongsTo(Category::class);
//    }
//
//    public function image()
//    {
//        return $this->hasMany(Image::class);
//    }
//
//    public function seo()
//    {
//        return $this->morphMany(Seo::class, 'tagable');
//    }

}
