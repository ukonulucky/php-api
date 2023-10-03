<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends User
{
    use HasFactory;
    protected $fillable = [
        'name',
        "desription"
    ];
    public function product(){
        return $this->belongsToMnay(Product::class);
    }
}
