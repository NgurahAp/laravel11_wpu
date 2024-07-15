<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class BlogPost extends Model
{
    // protected $table = 'blog_posts'; // Digunakan untuk nyambung ke spesifik table 'blog_posts'
    protected $primaryKey = 'post_id'; // Digunakan untuk set PK ke 'post_id'. Defaultnya PK nya 'id'
    protected $fillable = ['title', 'author', 'slug', 'body']; // Digunakan untuk element apa saja yg dapat diisi

    protected $with = ['author', 'category']; // Melakukan eager loading agar query tidak banyak

    use HasFactory;

    // Membuat Relasi M to 1 menggunakan belongsTo
    // Method ini digunakan untuk mencari author dari sebuah blog
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Membuat untul filtering/search yang digunakan di haalaman post
    public function scopeFilter(Builder $query, array $filters): void
    {
        // Menggunakan filter search sebagai default
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%') // Untuk mencari title
            //  
        );

        // Menggunakan filter category
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas(
                'category',
                fn ($query) => // Menggunakan whereHas karena memiliki relasi
                $query->where('slug', $category)
            )
        );

        // Menggunakan filter category
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) => // Menggunakan whereHas karena memiliki relasi
                $query->where('username', $author)
            )
        );
    }
}
