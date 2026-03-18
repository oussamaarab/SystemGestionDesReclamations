<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReclamationAssignment extends Model
{
    protected $fillable = [
        'reclamation_id',
        'from_division_id',
        'from_service_id',
        'to_division_id',
        'to_service_id',
        'comment',
        'assigned_by',
        'assigned_at',
    ];

    public function reclamation()
    {
        return $this->belongsTo(Reclamation::class);
    }

    public function fromDivision()
    {
        return $this->belongsTo(Division::class, 'from_division_id');
    }

    public function fromService()
    {
        return $this->belongsTo(Service::class, 'from_service_id');
    }

    public function toDivision()
    {
        return $this->belongsTo(Division::class, 'to_division_id');
    }

    public function toService()
    {
        return $this->belongsTo(Service::class, 'to_service_id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}