<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Employe;
class Conges extends Model
{
    use HasFactory;

     protected $table = 'conges';

     protected $fillable = [
         'user_id',
         'date_debut',
         'date_fin',
         'type_conge',
         'commentaire',
     ];

    // Relation : un congé appartient à un employé
    public function employe()
    {
        return $this->belongsTo(User::class,'user_id');
 
    }
}


