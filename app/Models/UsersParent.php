<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UsersParent extends Model
{
    use HasFactory;

    protected $table = 'users_parent';

    protected $guarded = [];

    public function getNameDad() {
        return $this->hasOne(User::class,'id','id_dad');
    }

    public function getNameSon() {
        return $this->hasOne(User::class,'id','id_child');
    }
}
