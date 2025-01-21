<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'specialization', 'experience', 'phone', 'address', 'image', 'documents', 'notes',
    ];


    public $incrementing = true;

    // Set whether the primary key is an integer
    protected $keyType = 'int';

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

