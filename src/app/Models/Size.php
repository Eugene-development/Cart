<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $guarded = [];

    protected $table = 'size';

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
