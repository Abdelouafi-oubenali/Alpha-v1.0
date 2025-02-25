<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = ['nom','responsable_id','entreprise_id'];
    public function entreprise(){
        return $this->belongsTo(Entreprise::class);
    }
    
    public function employes(){
        return $this->hasMany(Employe::class);
    }
    
}
