<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderPayment
 * 
 * @property int $id

 * @package App\Models
 */
class OrderPayment extends Model
{
	protected $table = 'order_payment';

	protected $fillable = [
		'id_order',
		'images'
	];

	
}
