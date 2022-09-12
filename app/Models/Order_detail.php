<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order_item::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }
}
