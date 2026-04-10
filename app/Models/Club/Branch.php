<?php
namespace App\Models\Club;

use App\Models\City;
use App\Models\Club;
use App\Models\TypeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id',
        'city_id',
        'country_id',
        'lat',
        'lng',
        'location',
        'balance',
        'currency_id',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function typeCategories()
    {
        return $this->hasMany(TypeCategory::class); // Define the relationship
    }
}
