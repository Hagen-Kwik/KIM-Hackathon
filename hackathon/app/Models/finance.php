<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finance extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama",
        "nominal",
        "kategori",
        "satuan",
        "jumlah"
    ];
}
