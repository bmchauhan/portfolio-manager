<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'skills_tools',
        'attachment_id',
        'type',
        'demo_link',
        'github_link',
    ];

    protected $casts = [
        'skills_tools' => 'array',
    ];

    public function attachment()
    {
        return $this->belongsTo(Attachment::class);
    }
}
