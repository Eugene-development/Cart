<?php


namespace App\Models;


use PhpParser\Node\Expr\AssignOp\Mod;

class Category extends Mod
{
    protected $guarded = [];

    protected $table = 'category';

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function rubric()
    {
        return $this->belongsTo(Rubric::class);
    }


}
