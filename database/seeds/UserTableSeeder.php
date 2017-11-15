<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User\([
            'email' => 'it@it.com',
            'password' => ' '
        ]);
        $user->save();
    }
}
