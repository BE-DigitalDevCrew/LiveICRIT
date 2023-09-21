<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationIncident extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'patient_id',
        'phone_number',
        'address',
        'email',
        'street_address',
        'city',
        'country',
        'relativeStatus',
        'detailsOfComplaint',
        'complaintDescription',
        'recordedBy',
        'injuries',
        'complaintDate',
        'position',
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
