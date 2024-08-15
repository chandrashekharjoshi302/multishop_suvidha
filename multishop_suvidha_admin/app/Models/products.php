<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'stock'
    ];

    public function category()
    {
        return $this->belongsTo(categories::class);
    }

    public function images()
    {
        return $this->hasMany(product_images::class);
    }

    public function cartItems()
    {
        return $this->hasMany(cart_items::class);
    }

    public function wishlistItems()
    {
        return $this->hasMany(wishlist_items::class);
    }

    public function orderItems()
    {
        return $this->hasMany(order_items::class);
    }

    public function reviews()
    {
        return $this->hasMany(reviews::class);
    }

    public function inventory()
    {
        return $this->hasOne(inventories::class);
    }
}
