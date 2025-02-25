<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
  

    protected $fillable = [
        'name',
        'guard_name'
    ];
    
    // Relation avec les rôles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
