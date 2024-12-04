<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    // relationship with book model

use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id',
        'session_id',
        'quantity',
        'price',
        
    ];

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
