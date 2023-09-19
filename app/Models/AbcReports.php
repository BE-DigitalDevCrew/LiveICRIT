<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbcReports extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'initialsOfPerson',
        'start_time',
        'end_time',
        'influencing_factors',
        'what_happened_before_incident',
        'behaviors', // Assuming this field will be stored as JSON or serialized array
        'what_happened_after_incident',
        'immediate_actions',
        'done_differently',
        'proact_scip_interventions',
        'medication_administered',
        'physical_contact_injury_intimidation',
        // Add more fields as needed
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
