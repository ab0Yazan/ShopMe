<?php

namespace Domain\Category\Actions;

use App\Models\Admin;
use Domain\Category\Models\Category;
use Domain\Category\DataTransferObjects\CategoryData;

class UpsertCategoryAction
{
    public function execute(CategoryData $data): Category
    {
        return Category::updateOrCreate(
            [
                "id" => $data->id
            ],
            [
                'name' => $data->name,
                'description' => $data->description,
            ]
        );
    }
}
