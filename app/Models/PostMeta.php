<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostMeta extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'key',
        'content'
    ];

    public function post(): BelongsTo 
    {
        return $this->belongsTo(Post::class);
    }
}
