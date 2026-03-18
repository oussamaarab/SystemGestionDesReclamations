<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    'division_id',
    'name',
    'code',
    'is_active',
];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    
    public function reclamations()
    {
        return $this->hasMany(Reclamation::class, 'current_service_id');
    }
}