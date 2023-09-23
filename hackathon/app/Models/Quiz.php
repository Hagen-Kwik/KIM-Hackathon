<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quiz extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'quiz_type_id',
    ];

    public function quiz_type() : BelongsTo
    {
        return $this->belongsTo(QuizType::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
