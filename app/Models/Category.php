<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    // protected $fillable = ['name', 'email', 'phone', 'img', 'bio'];
    protected $fillable = ['title','description'];
}
