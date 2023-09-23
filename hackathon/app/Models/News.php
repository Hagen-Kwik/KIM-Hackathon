<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'description',
        'video_link',
        'school_id',
    ];

    public function school() : BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function getCreatedAtAttribute($timestamp) {
        return Carbon::parse($timestamp)->locale('id-ID')->translatedFormat('d F Y');
    }
}
