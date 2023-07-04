<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $guarded = [];
=======

    protected $guarded = [];

>>>>>>> 0240729808d1d28ed1ec4840e74e38e19108a209
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
<<<<<<< HEAD
=======


>>>>>>> 0240729808d1d28ed1ec4840e74e38e19108a209
}