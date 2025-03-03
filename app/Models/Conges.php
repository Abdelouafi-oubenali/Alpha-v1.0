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
         'employee_id',
         'date_debut',
         'date_fin',
         'type_conge',
         'commentaire',
     ];

    // Relation : un congé appartient à un employé
    public function employes()
    {
        return $this->belongsTo(Employe::class);
    }
}


