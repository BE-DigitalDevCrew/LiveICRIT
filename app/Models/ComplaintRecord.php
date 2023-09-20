<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintRecord extends Model
{
    use HasFactory;use HasFactory;

    protected $fillable = [
        'person_name',
        'phone_number',
        'address',
        'email',
        'city',
        'county',
        'street_address',
        'relativeStatus',
        'detailsOfComplaint',
        'complaintDescription',
        'recordedBy',
        'complaintDate',
        'position',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }



    
}
