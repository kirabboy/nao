<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddressShipping extends Model
{
    use HasFactory;
    protected $table = 'user_address_shipping';

    protected $guarded = [];

    public function warehouse() {
        return $this->belongsTo(Warehouse::class, 'warehouse_id')->select('id_province', 'id_district');
    }

}
