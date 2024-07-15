<?php

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\BlogPost; // Import Model Post
use App\Models\Category;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page', 'Name' => 'Ngurah Arya',]); // Mengirim data ke view
});

Route::get('/posts', function () {

    // Mengambil req dari name yang ada di form
    // dump(request('search'));

    return view('posts', [
        'title' => 'Post Page',
        'blogPosts' => BlogPost::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString(), // Memanggil scope filter yang ada di model 
    ]); // Mengirim data ke view
});

Route::get('/postDetail/{post:slug}', function (BlogPost $post) {  // Mencari data berdasarkan atribut slug
    return view('postDetail', ['title' => 'Single post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', [
        'title' => count($user->blogPosts) . ' Article by: ' . $user->name,
        'blogPosts' => $user->blogPosts,
    ]); // Mengambil data berdasarkan class user method posts
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => 'Articles category: ' . $category->name,
        'blogPosts' => $category->blogPosts,
    ]); // Mengambil data berdasarkan class user method posts
});


Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page', 'Phone' => '08123456789',]); // Mengirim data ke view
});
