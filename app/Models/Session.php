<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'keywords',
        'cost',
        'isPayed',
        'user_id',
        'patient_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function note()
    {
        return $this->hasOne(Note::class);
    }
}
