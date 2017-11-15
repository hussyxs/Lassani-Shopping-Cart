<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'name' => 'Grill Box for One',
            'category_id'=> 1,
            'description' => 'Chicken tikka, Chicken BBQ, Kofta Seekh, Donner, Chicken wings and Chips. All served with a Pitta bread, Salad & Kebab sauce',
            'price' => 9.50
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Grill Box for Two',
            'category_id'=> 1,
            'description' => 'Chicken tikka, Chicken BBQ, Lamb Shish, Kofta Seekh and Donner Kebab, Chicken wings and Chips. All served with a Naan bread, Salad and Pakora & Kebab sauce',
            'price' => 13.50
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Munchy Box',
            'category_id'=> 1,
            'description' => '10" pizza Box filled with Vegetable, Chicken, Mushroom and Donner Pakora, Onion rings, Chicken wings, Donner Kebab, Potato fritters and Chips. All served with a Pitta bread, Salad and Pakora & Kebab sauce',
            'price' => 8.95
        ]);
        $product->save();

        $product = new \App\Product([
            'name' => 'Mega Munchy Box',
            'category_id'=> 1,
            'description' => '12" pizza Box filled with Vegetable, Chicken, Mushroom and Donner Pakora, Onion rings, Chicken wings, Donner Kebab, Potato fritters and Chips. All served with a Naan bread, Salad and Pakora & Kebab sauce',
            'price' => 10.95
        ]);
        $product->save();
        
        $product = new \App\Product([
            'name' => 'Pizza Meal for Two',
            'category_id'=> 1,
            'description' => '12" Pizza with any One Topping, two Chips & two Cans of soft Drink',
            'price' => 11.95
        ]);
        $product->save();
        
        $product = new \App\Product([
            'name' => 'Pizza Deal',
            'category_id'=> 2,
            'description' => '10" Pizza with any One Topping, Chips & Can of soft Drink',
            'price' => 7.50
        ]);
        $product->save();
        
        $product = new \App\Product([
            'name' => 'Cheese Burger',
            'category_id'=> 2,
            'description' => 'Cheese burger, Chips & Can of soft Drink',
            'price' => 4.50
        ]);
        $product->save();
        
        $product = new \App\Product([
            'name' => 'Chicken Pakora',
            'category_id'=> 2,
            'description' => 'Chicken pakora, Chips & Can of soft Drink',
            'price' => 5.50
        ]);
        $product->save();
        
        $product = new \App\Product([
            'name' => 'Chips Cheese n Donner',
            'category_id'=> 2,
            'description' => 'Chips, Cheese, Donner & Can of soft Drink',
            'price' => 5.00
        ]);
        $product->save();
        
        $product = new \App\Product([
            'name' => 'Chips n Donner',
            'category_id'=> 2,
            'description' => 'Chips, Donner & Can of soft Drink',
            'price' => 5.00
        ]);
        $product->save();
        
        $product = new \App\Product([
            'name' => 'Mixed Pakora',
            'category_id'=> 3,
            'description' => 'Chicken, Vegetable, Mushroom and Donner Pakora, Onion rings, Garlic bread fritters and Spicy Potato fritters',
            'price' => 5.50
        ]);
        $product->save();
    }
}
