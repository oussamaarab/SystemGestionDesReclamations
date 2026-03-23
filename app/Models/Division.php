<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'is_active'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    
    public function reclamations()
    {
        return $this->hasMany(Reclamation::class, 'current_division_id');
    }
}