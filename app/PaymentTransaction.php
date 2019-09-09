<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $table = 'payment_transactions'; // ชื่อตาราง
    protected $primaryKey = 'payment_id'; // ชื่อ Primary Key
}
