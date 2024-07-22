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
            'slug' => 'web-design',
            'color' => 'red'
        ]);

        Category::Create([
            'name' => 'Web Developer',
            'slug' => 'web-developer',
            'color' => 'blue'
        ]);

        Category::Create([
            'name' => 'Game Developer',
            'slug' => 'game-developer',
            'color' => 'yelow'
        ]);

        Category::Create([
            'name' => 'UI UX',
            'slug' => 'ui-ux',
            'color' => 'green'
        ]);
    }
}
