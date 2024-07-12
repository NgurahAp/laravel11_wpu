<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class, 'category_id'); // Untuk mengeset foreign key 'author_id'
    }
}
