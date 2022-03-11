<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        Category::factory(3)->create();
        Mahasiswa::factory(5)->create();
           

    }
}
