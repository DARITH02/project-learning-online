<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    protected $fillable = ['title', 'thumbnail', 'price', 'status', 'cate_id', 'description', 'level'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
    public function video()
    {
        return $this->hasMany(Lession::class,'course_id');
    }


}
