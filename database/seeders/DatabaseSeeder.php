<?php

namespace Database\Seeders;

use App\Models\Archive;
use App\Models\Category;
use App\Models\CategoryArchive;
use App\Models\News;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Category::create([
        //     'name' => 'Souvenier'
        // ]);
        // Category::create([
        //     'name' => 'Kuliner'
        // ]);

        $category_id = ["image", "video"];

        for ($i = 0; $i < 50; $i++) {
            $randomIndex = array_rand($category_id);
            Archive::create([
                'type' => $category_id[$randomIndex],
                'stone' => fake()->word(),
                'description' => fake()->paragraph(3),
            ]);
        }

        // for ($i = 0; $i < 50; $i++) {
        //     News::create([
        //         'judul' => fake()->word(),
        //         'description' => fake()->paragraph(3),
        //     ]);
        // }

        // CategoryArchive::create([
        //     'name' => 'Video'
        // ]);
        // CategoryArchive::create([
        //     'name' => 'Gambar'
        // ]);
    }
}
