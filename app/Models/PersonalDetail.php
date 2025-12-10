<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'headline',
        'email',
        'phone',
        'address',
        'bio',
        'linkedin_url',
        'github_url',
        'resume_id',
        'avatar_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resume()
    {
        return $this->belongsTo(Attachment::class, 'resume_id');
    }

    public function avatar()
    {
        return $this->belongsTo(Attachment::class, 'avatar_id');
    }
}
