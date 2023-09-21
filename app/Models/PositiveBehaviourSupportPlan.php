<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositiveBehaviourSupportPlan extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'patient_id',
        'todays_date',
        'review_date',
        'home_location',
        'street_address',
        'city',
        'county',
        'completed_by',
        'behaviors_when_happy_angry',
        'triggers',
        'actions',
        'behaviour_calm',
        'support',
        'behaviour_relaxed',
        'support_strategies',
        'recovery_period',
        'behaviour_crisis',
        'tablet_liquid',
        'strength',
        'route_admin',
        'dose_intervals',
        'dose_max',
        'consulted_medical_practitioner',
        'special_instructions',
        'reasons_admin',
        'name_medicine',
        'tablet_liquid',
        'strength',
        'admin_role',
        'dose_intervals',
        'max_dose',
        'medication',
        'reasons_for_admin',
        'condition',
        'history',
        'documentation',
        'personal_care',
        'family_views',
        'person_views',
        'controls_agreed',
        'deprivation_of_liberty',
        'name_aknowledged',
        'position',
        'role',
        'staff_email',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
