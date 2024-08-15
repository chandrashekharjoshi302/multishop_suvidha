<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $fillable = [
        'order_id',
        'payment_method',
        'payment_status',
        'amount'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
