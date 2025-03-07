<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongerJour extends Model
{
    use HasFactory;

    protected $table = 'conger_jour'; 

    protected $fillable = [
        'user_id',
        'date_debut',
        'date_fin',
        'nombre_jours',
        'type_conge',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
