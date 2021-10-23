<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = [];

    protected $table = 'price';

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

}
