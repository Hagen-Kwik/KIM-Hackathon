<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsPictures extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'pictureName',
        'news_id',
    ];

    public function news() : BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
