<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningType extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'learning_type',
    ];
}
