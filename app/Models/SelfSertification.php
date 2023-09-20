<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfSertification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'job_title',
        'service_department',
        'absence_date',
        'reason_of_absence',
        'absent_due_to_accident',
        'consulted_medical_practitioner',
        'medical_advice',
        'declaration',
        'declaration_name',
        'declaration_last_name',
        'declaration_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
