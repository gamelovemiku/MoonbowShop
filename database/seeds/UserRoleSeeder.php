<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_roles')->insert([
            [
                'role_id' => '1',
                'role_name' => 'Admin',
            ],
            [
                'role_id' => '2',
                'role_name' => 'Player',
            ]
        ]);
    }
}
