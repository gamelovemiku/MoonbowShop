<?php

use Illuminate\Database\Seeder;
use App\GeneralSettings;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_settings')->insert([
            [
                'hostname' => '10.10.1.76',
                'hostname_port' => 25565,
                'rcon_port' => 25575,
                'rcon_password' => '123456789',
                'website_name' => 'MoonbowShop',
                'website_desc' => 'A free minecraft shop',
            ],
        ]);
    }
}
