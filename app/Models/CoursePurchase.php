<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePurchase extends Model
{
    /** @use HasFactory<\Database\Factories\CoursePurchaseFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'course_id', 'price', 'purchased_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function course() {
        return $this->belongsTo(Courses::class);
    }
}
