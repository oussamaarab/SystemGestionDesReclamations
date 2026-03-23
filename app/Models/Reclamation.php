<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reclamation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'reference',
        'depot_date',
        'citizen_fullname',
        'citizen_phone',
        'citizen_cin',
        'subject',
        'description',
        'scan_path',
        'status',
        'current_division_id',
        'current_service_id',
        'created_by'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class,'current_division_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'current_service_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function assignments()
    {
    return $this->hasMany(ReclamationAssignment::class)
        ->orderBy('assigned_at', 'desc');
    }

    public function responses()
    {
        return $this->hasMany(ReclamationResponse::class)
            ->orderBy('responded_at', 'desc');
    }
    //scope
     public function scopeVisibleToUser($query, $user)
    {
        if ($user && $user->hasRole('AGENT_SERVICE')) {
            $query->where('current_service_id', $user->service_id);
        }

        return $query;
    }

    public function scopeFilter($query, $request, $user = null)
    {
        $query->visibleToUser($user);

        if ($request->filled('reference')) {
            $query->where('reference', 'like', '%' . $request->reference . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('division_id')) {
            $query->where('current_division_id', $request->division_id);
        }

        if ($request->filled('service_id') && !($user && $user->hasRole('AGENT_SERVICE'))) {
            $query->where('current_service_id', $request->service_id);
        }

        return $query;
    }
}