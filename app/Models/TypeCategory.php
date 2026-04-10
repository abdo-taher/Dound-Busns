<?php
namespace App\Models;

use App\Models\Club\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'img',
        'size',
        'grass_type',
        'category_id',
        'branch_id',
        'price',
        'type',
        'currency_id', // Add this if you have a currency_id in the type_categories table
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class); // Ensure this relationship is defined
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class); // Define relationship with Currency model
    }
}
