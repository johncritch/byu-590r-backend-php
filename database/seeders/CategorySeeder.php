<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'iMac'],
            ['name' => 'iPhone'],
            ['name' => 'iPad'],
            ['name' => 'iPod'],
            ['name' => 'Watch'],
            ['name' => 'Apple TV'],
            ['name' => 'Accessories'],
            ['name' => 'Software'],
            ['name' => 'iBook'],
            ['name' => 'MacBook'],
            ['name' => 'Other'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
