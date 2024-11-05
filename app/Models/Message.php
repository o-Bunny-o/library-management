<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Déclarez les champs autorisés pour l'assignation massive
    protected $fillable = [
        'name',        
        'email',       
        'subject',     
        'message',    
    ];
}

//Source :
//https://kinsta.com/blog/laravel-crud/
