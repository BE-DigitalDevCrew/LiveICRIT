<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'ref_number',
        'location',
        'date',
        'time',
        'person_affected',
        'initials',
        'description',
        'identified_causes',
        'completed_forms',
        'name_of_person',
        'date_completed',
        'manager_on_call',
    ];

    //an incident report belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // an incident report belongs to a patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
