<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $guarded = [];

    public function coursePrice() {
        return $this->hasOne(CoursePrice::class, 'id_ofcourse', 'id');
    }

    public function products() {
        return $this->belongstoMany(Product::class, 'course_product', 'course_id', 'product_id');
    }
}
