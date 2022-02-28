<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingBill extends Model
{
    use HasFactory;
    protected $table = 'shipping_bill';
    protected $guarded = [];

    public function order(){
      return $this->belongsTo(Order::class, 'order_id');
    }
    public function status(){
      return $this->hasOne(ShippingStatus::class, 'status_id', 'status');
    }
}
