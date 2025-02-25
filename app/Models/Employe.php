<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeFactory> */
    use HasFactory;

    protected $fillable = ['user_id','département_id','poste','date_embauche','salaire'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function contrat(){
        return $this->belongsTo(Contrat::class);
    }
}
