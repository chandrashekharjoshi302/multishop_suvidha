<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shippings extends Model
{
    protected $fillable = [
        'order_id',
        'address',
        'shipping_method',
        'shipping_status'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
