<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlists extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishlistItems()
    {
        return $this->hasMany(wishlist_items::class);
    }
}
