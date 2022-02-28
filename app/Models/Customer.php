<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $guarded = [];

    public function customer_address() {
        return $this->hasMany(CustomerAddress::class, 'id_customer', 'id');
    }
}
