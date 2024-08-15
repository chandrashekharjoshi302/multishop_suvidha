<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventories extends Model
{
    protected $fillable = [
        'product_id',
        'stock'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
