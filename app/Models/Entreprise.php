<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    /** @use HasFactory<\Database\Factories\EntrepriseFactory> */
    use HasFactory;
    protected $fillable = ['name','email','phone_number','adresse'];

    // les rolasion des class
    public function utilisateurs (){
        return $this->hasMany(User::class);
    }
    public function departements(){
        return $this->hasMany(Departement::class);
    }
}
