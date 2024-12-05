<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'payment_method',
        'status',
        'transaction_id',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with OrderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
