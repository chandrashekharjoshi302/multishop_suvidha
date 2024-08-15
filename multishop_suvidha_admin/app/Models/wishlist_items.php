<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist_items extends Model
{
    protected $fillable = [
        'wishlist_id',
        'product_id'
    ];

    public function wishlist()
    {
        return $this->belongsTo(Wishlists::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
