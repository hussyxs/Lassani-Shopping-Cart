<?php

use Illuminate\Database\Seeder;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('product_type')->insert(array(
            array('product_id'=>'5','type_id'=>'1'),
            array('product_id'=>'5','type_id'=>'2'),
            array('product_id'=>'5','type_id'=>'3'),
            array('product_id'=>'5','type_id'=>'4'),
            array('product_id'=>'5','type_id'=>'5'),
            array('product_id'=>'5','type_id'=>'6'),
            array('product_id'=>'6','type_id'=>'1'),
            array('product_id'=>'6','type_id'=>'2'),
            array('product_id'=>'6','type_id'=>'3'),
            array('product_id'=>'6','type_id'=>'4'),
            array('product_id'=>'6','type_id'=>'5'),
            array('product_id'=>'6','type_id'=>'6'),
            array('product_id'=>'11','type_id'=>'7'),
            array('product_id'=>'11','type_id'=>'8'),
        ));
    }
}
