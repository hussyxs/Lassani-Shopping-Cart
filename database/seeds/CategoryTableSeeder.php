<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category([
            'name' => 'Special Offers'
        ]);
        $category->save();
        
        $category = new \App\Category([
            'name' => 'Tea Time Specials'
        ]);
        $category->save();
        
        $category = new \App\Category([
            'name' => 'Starters'
        ]);
        $category->save();
    }
}
