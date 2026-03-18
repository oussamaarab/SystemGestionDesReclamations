<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReclamationResponse extends Model
{
    protected $fillable = [
        'reclamation_id',
        'responded_by',
        'response_text',
        'response_file_path',
        'responded_at'
    ];

    public function reclamation()
    {
        return $this->belongsTo(Reclamation::class);
    }

    public function respondedBy()
    {
        return $this->belongsTo(User::class, 'responded_by');
    }
}