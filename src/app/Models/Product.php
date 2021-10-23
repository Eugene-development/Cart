<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $table = 'product';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function action()
//    {
//        return $this->belongsTo(Category::class);
//    }

    public function size()
    {
        return $this->hasMany(Size::class);
    }

//    public function image()
//    {
//        return $this->morphMany(Image::class, 'tagable');
//    }




}
