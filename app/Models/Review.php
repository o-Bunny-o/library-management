<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'rating', 'review_text'];

    // relationship with book model
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // relationship with user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
