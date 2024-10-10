<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $color=['red','orange','amber','yellow','lime','green',
            'emerald','teal','cyan','sky','blue','indigo','violet',
            'purple','fuchsia','pink','rose'];
        $categories=[
            ['FnB','red'],
            ['Transport','yellow'],
            ['Groceries','blue'],
            ['Shopping','violet']
        ];
        foreach($categories as $category){
            Category::create([
                'name'=>$category[0],
                'color'=>$category[1]
            ]);
        }
    }
}
