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
            'name' => 'Politik',
            'slug' => 'politik',
            'color' => 'red'
        ]);

        Category::Create([
            'name' => 'olahraga',
            'slug' => 'olahraga',
            'color' => 'blue'
        ]);

        Category::Create([
            'name' => 'Hiburan',
            'slug' => 'hiburan',
            'color' => 'yellow'
        ]);

        Category::Create([
            'name' => 'pendidikan',
            'slug' => 'pendidikan',
            'color' => 'green'
        ]);
    }
}
