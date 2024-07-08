<?php

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\BlogPost; // Import Model Post


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page', 'Name' => 'Ngurah Arya',]); // Mengirim data ke view
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Post Page', 'blogPosts' => BlogPost::all()]); // Mengirim data ke view
});

Route::get('/postDetail/{post:slug}', function (BlogPost $post) {  // Mencari data berdasarkan atribut slug
    return view('postDetail', ['title' => 'Single post', 'post' => $post]);
});

Route::get('/authors/{user}', function (User $user) {   
    return view('posts', ['title' => 'Article by: ' . $user->name, 'blogPosts' => $user->blogPosts]); // Mengambil data berdasarkan class user method posts
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page', 'Phone' => '08123456789',]); // Mengirim data ke view
});
