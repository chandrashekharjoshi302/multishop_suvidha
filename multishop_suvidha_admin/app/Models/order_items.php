<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(order_items::class);
    }

    public function payment()
    {
        return $this->hasOne(Payments::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shippings::class);
    }
}
