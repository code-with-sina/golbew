<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'slug',
        'content',
        'meta_title',
        'title',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function post(): HasMany 
    {
        return $this->hasMany(Post::class);
    }
}
