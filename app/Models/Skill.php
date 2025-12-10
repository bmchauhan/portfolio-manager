<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'proficiency',
        'icon',
    ];

    public function experiences()
    {
        return $this->belongsToMany(Experience::class, 'experience_skill');
    }
}
