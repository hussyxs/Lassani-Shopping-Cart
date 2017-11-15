<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new \App\Type([
            'type_name' => 'Cheese',
            'type_price' => 0
        ]);
        $type->save();
        
        $type = new \App\Type([
            'type_name' => 'Chicken',
            'type_price' => 1
        ]);
        $type->save();
        
        $type = new \App\Type([
            'type_name' => 'Pepperoni',
            'type_price' => 1
        ]);
        $type->save();
        
        $type = new \App\Type([
            'type_name' => 'Ham',
            'type_price' => 1
        ]);
        $type->save();
        
        $type = new \App\Type([
            'type_name' => 'Onion',
            'type_price' => 1
        ]);
        $type->save();
        
        $type = new \App\Type([
            'type_name' => 'Donner',
            'type_price' => 1
        ]);
        $type->save();
        
        $type = new \App\Type([
            'type_name' => 'Regular',
            'type_price' => 0
        ]);
        $type->save();
        
        $type = new \App\Type([
            'type_name' => 'Large',
            'type_price' => 1
        ]);
        $type->save();
    }
}
