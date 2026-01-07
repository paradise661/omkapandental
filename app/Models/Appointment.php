<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'patient_type',
        'service_type',
        'doctor',
        'appointment_date',
        'appointment_time',
        'reason_visit',
        'insurance',
        'insurance_provider',
        'policy_number',
        'group_number',
        'medical_conditions',
        'medication',
        'allergies',
        'appointment_reminders',
    ];

    protected $casts = [
        'medical_conditions' => 'array',
        'appointment_reminders' => 'array',
        'dob' => 'date',
        'appointment_date' => 'date',
    ];
}
