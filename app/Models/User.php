<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $table = 'users';

    // protected $guarded = 'user';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function id_dad() {
        return $this->hasOne(UsersParent::class,'id_child','id')->with('name_dad');
    }

    //Function khong lay account NAO
    public function getIdDad() {
        return $this->hasOne(UsersParent::class,'id_child','id')->with('getNameDad');
    }

    public function getIdSon() {
        return $this->hasMany(UsersParent::class,'id_dad','id');
    }

    public function getIdCustomers() {
        return $this->hasMany(Customer::class,'id_ofuser','id');
    }

    public function getNangcap() {
        return $this->hasMany(UserUpgrade::class, 'user_id', 'id');
    }

    public function user_address_shipping() {
		return $this->hasOne(UserAddressShipping::class, 'user_id');
	}

    public function orders() {
        return $this->hasMany(Order::class, 'id_user');
    }

    public function PointNAO() {
        return $this->hasOne(PointNAO::class, 'user_id', 'id');
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class, 'id_warehouse')->select('id_province', 'id_district');
    }

    public function DoanhThuNgay() {
        return $this->hasMany(DoanhThuNgay::class, 'user_id', 'id');
    }

    public function DoanhThuThang() {
        return $this->hasMany(DoanhThuThang::class, 'user_id', 'id');
    }
}
