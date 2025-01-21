<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'payment_method',
        'card_name',
        'card_number',
        'expiry_month',
        'expiry_year',
        'cvv',
        'terms_accept',
        'patient_id',
        'doctor_id',
        'amount',
    ];
}
