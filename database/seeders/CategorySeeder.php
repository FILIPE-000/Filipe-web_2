<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $Categories = [
         'ficção', 'não-ficção','fantasia',
         'ciência', 'biografia','história',
         'tecnologia','arte','culinária',
         'viagem'
        ];

        foreach($Categories as $Category){
            Category::create(['name' => $Category]);
        }
    }
}
