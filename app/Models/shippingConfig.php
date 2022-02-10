<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shippingConfig extends Model
{
    use HasFactory;
    protected $table = 'shipping_config';
    protected $guarded = [];
}
