<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subject',
        'author',
        'approach',
        'description',
        'availability',
        'date',
        'image'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'seminar_user');
    }

    public function isSubscribed($id)
    {
        if($this->users->find($id)){
            return true;
        }
        return false;
    }
}
