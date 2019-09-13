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
                'plan_price' => 349,
                'plan_points_amount' => 1000,
                'plan_points_multiplier' => 10,
            ],
            [
                'plan_provider' => "omise.co",
                'plan_price' => 2200,
                'plan_points_amount' => 2100,
                'plan_points_multiplier' => 5,
            ]
            ,
            [
                'plan_provider' => "omise.co",
                'plan_price' => 899,
                'plan_points_amount' => 3400,
                'plan_points_multiplier' => 3,
            ]
        ]);
    }
}
