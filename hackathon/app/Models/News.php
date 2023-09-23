<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'description',
        'video_link',
        'judul',
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
