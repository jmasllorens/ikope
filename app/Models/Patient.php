<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'pronoun',
        'motive',
        'email',
        'isConsulting'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'seminar_user');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
