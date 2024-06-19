<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'price',
        'product_code',
        'description',
        'image',
        'width',
        'height',
        'depth',
        'weight',
        'quality_checking',
        'quantity',
        'color',
        'discount'
    ];

    public function cartItems(){
        return $this->hasMany(CartItem::class);
    }
}
