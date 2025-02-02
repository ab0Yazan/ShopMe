<?php

namespace Domain\Product\Models;

use App\Casts\PriceCast;
use Domain\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
    ];

    protected $casts = [
        'price' => PriceCast::class
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
