<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    protected $table = 'lessions';
    protected $fillable = ['course_id', 'video_path','module_id'];

    public function course()
    {
        return $this->belongsTo(Courses::class,'course_id');
    }
    public function module()
    {
        return $this->belongsTo(Module::class,'module_id');
    }
}
