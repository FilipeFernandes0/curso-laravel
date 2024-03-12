<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::truncate();
        // Post::truncate();
        // Category::truncate();^
        //nao precisamos visto que so vamos
        //fazer seed quando damos fresh na base de dados
        

        Post::factory(5)->create();
    }
}
