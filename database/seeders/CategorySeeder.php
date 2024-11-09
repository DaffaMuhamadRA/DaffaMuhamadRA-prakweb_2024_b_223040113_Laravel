<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(3)->create();
        Category::create([
            'name' => 'Web Design',
            'slug' => 'Web-Dessign'
        ]);

        Category::create([
            'name' => 'UI UX',
            'slug' => 'UI-UX'
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'Machine-Learning'
        ]);

        Category::create([
            'name' => 'Data Structure',
            'slug' => 'Data-Structure'
        ]);

    }
}
