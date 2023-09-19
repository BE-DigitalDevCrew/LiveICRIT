<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationRiskAssessment extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'assessment_date',
        'assessors_email',
        'patient_id',
        'what_causes_harm',
        'where_is_the_hazard',
        'who_might_be_harmed',
        'how_will_they_be_harmed',
        'how_often_are_exposed_hazard',
        'how_long_exposed_hazard',
        'disallowing_activity',
        'comment',
        'likelihood_harm',
        'how_serious_harm_radio',
        'list_of_control_measures',
        'date_when_control_measures_implemented',
        'identity_training_required_risk',
        'identity_training_was_specified',
        'identity_equipment_reduced_risk',
        'date_equipment_provided',
        'likelihood_radio_harm',
        'additional_control_measures',
        'completion_control_measures',
        'risk_assessment_drawn_by',
        'risk_assessment_date',
        'assessment_taken_mental',
        'please_comment_any_behaviours',
        'positive_liberty_issue',
        'outcome_best_interest_radio',
        'comment',
        'date_of_review',
        'changes_required',
        'managers_name',
        'risk_assessment_Activity_accessed',
        'date_of_assessment',
        'signage_name',
        'signage_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }

}
