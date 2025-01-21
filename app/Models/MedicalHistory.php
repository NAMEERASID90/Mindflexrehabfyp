<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'doctor_first_name',
        'doctor_last_name',
        'consultation_date',
        'past_medical_history',
        'current_medications',
        'reason_for_visit',
        'allergies',
        'allergy_details',
        'health_rating',
        'family_history',
        'family_history_details',
        'exercise',
        'comments',
    ];
}
