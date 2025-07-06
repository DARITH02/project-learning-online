<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    protected $table = 'lessions';
    protected $fillable = ['course_id', 'video_path'];

    public function course()
    {
        return $this->belongsTo(Courses::class,'course_id');
    }
}
