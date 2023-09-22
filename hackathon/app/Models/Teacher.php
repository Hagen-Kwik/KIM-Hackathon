<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'teacherName',
        'description',
        'job_title',
        'whatsapp',
        'email',
        'instagram',
        'learning_id',
    ];

    public function learning() : BelongsTo
    {
        return $this->belongsTo(Learning::class);
    }
}
