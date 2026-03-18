<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'service_id',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}