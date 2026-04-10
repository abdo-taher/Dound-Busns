<?php

namespace App\Models;

use App\Models\Club\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'symbol', 'exchange_rate', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function typeCategories()
    {
        return $this->hasMany(TypeCategory::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
