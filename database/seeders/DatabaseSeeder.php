<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create(); // Membuat 10 data user

        // User::factory()->create([    // Membuat 1 data user dengan name dan email yang sesuai
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // MELAKUKAN SEED SESUAI DENGAN FACTORY
        // User::create([
        //     'name' => 'Ngurah Arya',
        //     'username' => 'ngurahap',
        //     'email' => 'ngurah@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design',
        // ]);

        // BlogPost::create([
        //     'title' => 'Judul Post Pertama',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-post-pertama',
        //     'body' => 'lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, quae.',
        // ]);

        // BlogPost::factory(100)->recycle([
        //     Category::factory(3)->create(),
        //     User::factory(5)->create(),
        // ])->create();

        // MELAKUKAN SEED DAN MEMASUKAN ELEMENT YANG DIINGINKAN

        // $ngurah = User::create([
        //     'name' => 'Ngurah Arya',
        //     'username' => 'ngurahap',
        //     'email' => 'ngurah@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // BlogPost::factory(100)->recycle([
        //     Category::factory(3)->create(),
        //     $ngurah,  // memasukan user ngurah beserta 5 user lainnya

        // ])->create();

        // MELAKUKAN SEED SECARA BETUL

        $this->call([CategorySeeder::class, UserSeeder::class]); // memanggil semua seeder

        BlogPost::factory(100)->recycle([
            Category::all(), // Memanggil semua category 
            User::all(),    // Memanggil semua user
        ])->create();
    }
}
