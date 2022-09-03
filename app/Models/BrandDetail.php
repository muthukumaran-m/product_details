<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandDetail extends Model
{
    use HasFactory;

    protected $appends = ['total'];

    public function getTotalAttribute()
    {
        $total = 0;

        foreach ($this->products as  $value) {
            $price = $value->price;
            $discount = $value->discount;
            $tax = $value->tax;
            $quantity = $value->quantity;

            $mrp = $price - ($price * ($discount / 100)) + ($price * ($tax / 100));
            $total = $total + ($mrp * $quantity);
        }

        return $total;
    }

    public function products()
    {
        return $this->hasMany(ProductDetail::class, 'brand_detail_id');
    }
}
