<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    // protected $table = 'blog_posts'; // Digunakan untuk nyambung ke spesifik table 'blog_posts'
    protected $primaryKey = 'post_id'; // Digunakan untuk set PK ke 'post_id'. Defaultnya PK nya 'id'
    protected $fillable = ['title', 'author', 'slug', 'body']; // Digunakan untuk element apa saja yg dapat diisi
    
    use HasFactory;

    // Membuat Relasi M to 1 menggunakan belongsTo
    // Method ini digunakan untuk mencari author dari sebuah blog
    public function author(): BelongsTo
    {   
        return $this->belongsTo(User::class);
    }

    

}
