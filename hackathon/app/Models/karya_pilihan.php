<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karya_pilihan extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "judul",
        "link",
        "vote"
    ];
}
