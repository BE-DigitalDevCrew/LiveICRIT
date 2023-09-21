<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FallsChecklist extends Model
{
    use HasFactory;

    protected $table = 'falls_checklists';

    protected $fillable = [
        'patient_id',
        'date',
        'incident_ref',
        'completed_by',
        'health_concern',
        'personal_care',
        'breathing',
        'head_injury',
        'fall_distance',
        'serious_injury_suspected',
        'bleeding_or_skin_tear',
        'unusual_pain',
        'weight_bear',
        'recommend_attendance',
        'use_hoist',
        'hoist_not_used_space',
        'comments_space',
        'hoist_not_used_dignity',
        'comments_dignity',
        'comments_position',
        'comments_other',
        'handling_belt_used',
        'comments_belt',
        'pain_altered',
        'able_to_walk',
        'immediate_cause',
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
