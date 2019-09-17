<?php

use Illuminate\Database\Seeder;

class TopupPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_plans')->insert([
            [
                'plan_provider' => "omise.co",
                'plan_title' => 'Just play',
                'plan_price' => 35,
                'plan_points_amount' => 120,
                'plan_points_multiplier' => 10,
            ],
            [
                'plan_provider' => "omise.co",
                'plan_title' => 'Bigger Better!',
                'plan_price' => 149,
                'plan_points_amount' => 540,
                'plan_points_multiplier' => 5,
            ]
            ,
            [
                'plan_provider' => "omise.co",
                'plan_title' => 'Be the lord.',
                'plan_price' => 395,
                'plan_points_amount' => 1420,
                'plan_points_multiplier' => 3,
            ]
        ]);
    }
}
