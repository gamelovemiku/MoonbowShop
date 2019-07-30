<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreItems extends Model
{
    protected $table = 'store_item'; // ชื่อตาราง
    protected $primaryKey = 'item_id'; // ชื่อ Primary Key

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

}
