<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    
    public $timestamps = true; //Indique a Laravel que les collones 'create_at' et 'updated_at' doivent être créés et mis à jour lors de l'enregistrement et de la modification de la table.

    //Déclare les champs autorisés pour l'assignation massive ('$fillable' est une propriété de la classe 'Model' elle est utiliser pour proteger les données de l'utilisateur contre les attaques de type injection de code)
    protected $fillable = [ //Indique à Laravel quels sont les champs autorisés lors de l'enregistrement et de la modification de la table.
        'title',
        'author',
        'year',
        'genre',
        'description',
        'price',
        
    ];
    
    // relationship with category model
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // relationship with reviews model
    public function reviews() {
        return $this->hasMany(Review::Class);
    }

    // relationship with favorite model
    public function favorites() {
        return $this->hasMany(Favorite::Class);
    }

    // relationship with cart model
    public function cart() {
        return $this->hasMany(CartItem::Class);
    }
}

//Source :
//https://kinsta.com/blog/laravel-crud/
//cours du 13 et 14 novembre