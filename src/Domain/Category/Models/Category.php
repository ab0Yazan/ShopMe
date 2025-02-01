<?php

namespace Domain\Category\Models;

use Domain\Category\Builders\CategoryBuilder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function newEloquentBuilder($query): CategoryBuilder
    {
        return new CategoryBuilder($query);
    }
}
