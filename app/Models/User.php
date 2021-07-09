<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
    public function favoris()
    {
        return $this->belongsToMany(Article::class,'favoris');
    }
    public function adresses()
    {
        return $this->hasMany(Adresse::class); 
    }
    public function avis()
    {
        return $this->hasMany(Avi::class);    
    }
    public function isAdmin()
    {   
      return auth()->user()->role_id == 2;
    }
}
