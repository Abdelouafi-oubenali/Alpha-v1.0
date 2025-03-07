<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formation extends Model
{
    protected $fillable = [
        'titre', 'description', 'date_debut', 'date_fin'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'formation_user');
    }
}
