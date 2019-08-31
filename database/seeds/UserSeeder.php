<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'admin',
                'email' => 'admin@moonbowmc.net',
                'password' => Hash::make('admin'),
                'points_balance' => '5000',
                'role_id' => 1,

            ],
        ]);
    }
}
