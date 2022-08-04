<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'age',
        'next_of_kin',
        'email',
        'sponsor',
        'residential_state',
        'residential_lga',
        'appointment_date'
    ];
}
