<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Import the Order and Book models
use App\Models\Order;
use App\Models\Book;

class OrderItem extends Model
{
    use HasFactory;

    // Define fillable fields
    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
        'price',
    ];

    /**
     * Get the order that owns the order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the book associated with the order item.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
