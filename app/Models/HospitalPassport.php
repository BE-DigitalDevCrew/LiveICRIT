<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalPassport extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'assessment_date',
         'patient_id',
        'staff_email',
        'patient_name',
        'likes_to_be_known',
        'nhs_number',
        'dob',
        'address',
        'city',
        'county',
        'country',
        'phone_number',
        'email',
        'my_support_care_needs',
        'my_carer_speaks',
        'things_to_know',
        'religious_needs',
        'ethnicity',
        'gp_name',
        'gp_address',
        'gp_city',
        'gp_county',
        'gp_other_services',
        'gp_social_worker',
        'gp_allergies',
        'gp_medical_interventions',
        'gp_cardio_vascular',
        'gp_risk_of_chocking',
        'gp_current_medication',
        'gp_mymedicalhistory',
        'gp_anxious',
        'how_to_comm',
        'how_i_medicate',
        'how_you_know_pain',
        'moving_around',
        'person_care',
        'seeing_hearing',
        'how_i_eat',
        'how_i_keep_safe',
        'how_i_toilet',
        'sleeping_pattern',
        'likes',
        'dislike',
        'additional_info',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
