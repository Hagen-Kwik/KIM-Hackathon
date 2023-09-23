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
        'starts_at',
        'ends_at',
    ];
}
