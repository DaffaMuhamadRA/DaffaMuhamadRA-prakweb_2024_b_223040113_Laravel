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
            'slug' => 'Web-Dessign',
            'color' => 'red'
            
        ]);

        Category::create([
            'name' => 'UI UX',
            'slug' => 'UI-UX',
            'color' => 'green'
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'Machine-Learning',
            'color' => 'blue'
        ]);

        Category::create([
            'name' => 'Data Structure',
            'slug' => 'Data-Structure',
            'color' => 'yellow'
        ]);

    }
}
