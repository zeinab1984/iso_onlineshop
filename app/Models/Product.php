<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function showProduct()
    {
        return $products = Product::all();
    }



    public function pic()
    {
        return $this->morphOne(File::class,'fileable');
    }

    public function featuers()
    {
        return $this->hasMany(Attribute::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
