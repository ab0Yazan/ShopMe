<?php

namespace Domain\Category\Actions;

use App\Models\Admin;
use Domain\Category\Models\Category;
use Domain\Category\DataTransferObjects\CategoryData;

class UpsertCategoryAction
{
    public function execute(CategoryData $data, ?int$id = null): Category
    {
        return Category::updateOrCreate(
            [
                "id" => $id
            ],
            [
                'name' => $data->name,
                'description' => $data->description,
            ]
        );
    }
}
