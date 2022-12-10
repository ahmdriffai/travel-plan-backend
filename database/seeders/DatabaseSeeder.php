<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Place;
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
        // \App\Models\User::factory(10)->create();
        $categoryName = ['penginapan', 'wisata'];
        for ($i=0; $i < count($categoryName); $i++) { 
            Category::factory()->create(['name' => $categoryName[$i]]);
        }

        
        Place::factory(5)->create();
    }
}
