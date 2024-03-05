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
    
        $adminUserId = User::where('role', 'admin')->value('id');

        $categories = [
            ['name' => 'Category 1', 'user_id' => $adminUserId],
            ['name' => 'Category 2', 'user_id' => $adminUserId],
            ['name' => 'Category 3', 'user_id' => $adminUserId],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
