<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';
    protected $fillable = ['course_id', 'title'];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}
