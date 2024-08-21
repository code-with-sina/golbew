<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'meta_title',
        'slug',
        'content',
        'summary',
        'image',  
        'user_id',
        'tags',
        'subcategory_id',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tag(): HasMany 
    {
        return $this->hasMany(Tag::class);
    }


    // public function getDynamicSEOData(): SEOData
    // {
    //     // $pathToFeaturedImageRelativeToPublicPath = // ..;

    //     // Override only the properties you want:
    //     return new SEOData(
    //         title: $this->title,
    //         description: $this->excerpt,
    //         // image: $pathToFeaturedImageRelativeToPublicPath,
    //     );
    // }
}
