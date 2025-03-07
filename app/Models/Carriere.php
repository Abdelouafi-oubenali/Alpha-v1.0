<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carriere extends Model
{

    use HasFactory;
    protected $fillable = [
        'poste', 'description', 'date_debut', 'date_fin', 'employe_id'
    ];

    /**
     * Une carrière appartient à un employé
     */
    public function employe(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employe_id');
    }
    
}
