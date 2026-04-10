<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id',
        'category_id',
        'duration',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
