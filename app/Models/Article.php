<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'gamme_id',
        'description',
        'description_detaillee',
        'image',
        'prix',
        'stock',
    ];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_articles')->withPivot('quantite');
    }

    public function gammes()
    {
        return $this->belongsTo(Gamme::class);
    }
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'promotion_articles');
    }
    public function favoris()
    {
        return $this->belongsToMany(User::class, 'favoris');
    }
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
}
