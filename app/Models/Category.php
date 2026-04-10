<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'image',
    ];

    public function clubs()
    {
        return $this->hasMany(Club::class);
    }

}
