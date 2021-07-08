<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'reduction',
        'date_debut',
        'date_fin',
    ];
    
    public function articles()
    {
        return $this->belongsToMany(Article::class,'promotion_articles');
    }
}
