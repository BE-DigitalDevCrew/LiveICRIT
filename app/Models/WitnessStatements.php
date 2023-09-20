<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WitnessStatements extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'ref_number',
        'injured_person',
        'date_of_accident',
        'time_of_accident',
        'witness_dob',
        'witness_homeaddress',
        'street_address',
        'city',
        'county',
        'tel_number',
        'fitzRoyEmployee',
        'occupation',
        'what_happened',
        'position',
        'description_accident',
        'where_were_you_positioned',
        'any_other_information',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
