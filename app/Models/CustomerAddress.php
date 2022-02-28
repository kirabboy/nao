<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $table = 'customer_address';

    protected $guarded = [];

    public function customer(){
    	return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class, 'id_warehouse')->select('id_province', 'id_district');
    }
}
