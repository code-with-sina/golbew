<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'about',
        'image_url'
    ];

    public function post(): HasMany 
    {
        return $this->hasMany(Post::class);
    }
}
