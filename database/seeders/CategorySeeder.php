<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::Create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::Create([
            'name' => 'Web Developer',
            'slug' => 'web-developer'
        ]);

        Category::Create([
            'name' => 'Game Developer',
            'slug' => 'game-developer'
        ]);

        Category::Create([
            'name' => 'UI UX',
            'slug' => 'ui-ux'
        ]);

        Category::factory(1)->create();
    }
}
