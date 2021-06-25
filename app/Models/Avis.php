<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avi extends Model
{
    use HasFactory;
    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}