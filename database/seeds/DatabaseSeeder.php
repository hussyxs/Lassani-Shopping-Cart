<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->command->info("category table seeded :)");
        $this->call(ProductTableSeeder::class);
        $this->command->info("product table seeded :)");
        $this->call(TypeTableSeeder::class);
        $this->command->info("Types table seeded :)");
        $this->call(ProductTypeTableSeeder::class);
        $this->command->info("Product Pivot Types table seeded :)");
    }
}
