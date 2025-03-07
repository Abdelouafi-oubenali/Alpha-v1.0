<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;
use  App\Models\Parcours;
use  App\Models\Conges;

use function PHPUnit\Framework\returnSelf;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'photo_profil', 'téléphone', 'entreprise_id', 'posIdt','role'
    ];

    // les rolesion de 
    public function entreprise (){
        return $this->belongsTo(Entreprise::class);
    }

    public function employe(){
        return $this->hasOne(Employe::class);
    }

    public function formations(): HasMany
    {
        return $this->hasMany(Formation::class, 'employe_id');
    }

    public function carrieres(): HasMany
    {
        return $this->hasMany(Carriere::class, 'employe_id');
    }
    // Dans le modèle User.php
    public function parcours()
    {
        return $this->hasMany(Parcours::class);
    }

    public function congers()
{
    return $this->hasMany(Conges::class, 'user_id');
    

}


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
