<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name',
        'file_path',
        'mime_type',
        'file_size',
    ];

    public function getUrlAttribute()
    {
        return Storage::url($this->file_path);
    }
}
