<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'age',
        'surname',
        'pronoun',
        'motive',
        'history',
        'isConsulting',
        'user_id'
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
