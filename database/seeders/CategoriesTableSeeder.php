<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => '{"tr":"PHP","en":"PHP" }',
        ]);
        Category::create([
            'name' => '{"tr":"Javascript","en":"Javascript" }',
        ]);
        Category::create([
            'name' => '{"tr":"CSS","en":"CSS" }',
        ]);
        Category::create([
            'name' => '{"tr":"Laravel","en":"Laravel" }',
        ]);
        Category::create([
            'name' => '{"tr":"Dizayn","en":"Design" }',
        ]);
        Category::create([
            'name' => '{"tr":"React.js","en":"React.js" }',
        ]);
        Category::create([
            'name' => '{"tr":"Next.js","en":"Next.js" }',
        ]);
    }
}
