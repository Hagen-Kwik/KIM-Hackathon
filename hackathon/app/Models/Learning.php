<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Learning extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'picture',
        'starts_at',
        'ends_at',
        'school_id',
    ];

    public function school() : BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
