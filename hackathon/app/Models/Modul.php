<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modul extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'file',
        'youtube_link',
        'learning_type_id',
        'learning_id',
    ];

    public function learningType() : BelongsTo
    {
        return $this->belongsTo(LearningType::class);
    }

    public function learning() : BelongsTo
    {
        return $this->belongsTo(Learning::class);
    }
}
