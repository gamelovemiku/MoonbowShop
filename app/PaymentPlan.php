<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    protected $table = 'payment_plans'; // ชื่อตาราง
    protected $primaryKey = 'plan_id'; // ชื่อ Primary Key

    protected $fillable = ['plan_provider', 'plan_price', 'plan_points_amount', 'plan_points_multiplier'];

}
