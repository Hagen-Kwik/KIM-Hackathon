<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModulSuccess extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'modul_id',
        'file'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function modul() : BelongsTo
    {
        return $this->belongsTo(Modul::class);
    }
}
