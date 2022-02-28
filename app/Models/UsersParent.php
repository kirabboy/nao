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
        return $this->hasOne(User::class,'id','id_dad')->where('id','!=',1)->with('getIdDad.getNameDad');
    }

    public function getNameSon() {
        return $this->hasOne(User::class,'id','id_child')->where('id','!=',1)->with('getIdSon.getNameSon','pointNAO');
    }

    public static function recursive($bigDad, $parent = 1, $level = 0, &$listTree) {
        if(count($bigDad) > 0) {
            foreach ($bigDad as $key => $value) {
                if($value->id_dad == $parent) {
                    $value->id_child = $level;
                    $listTree[] = $value;
                    unset($bigDad[$key]);
                    $parent = $value->id_dad;
                    self::recursive($bigDad, $parent, $level + 1, $listTree);
                }
            }
        }
    }
}
