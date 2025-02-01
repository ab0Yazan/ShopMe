<?php

namespace App\Http\Controllers\API\Category;
use App\Http\Controllers\API\BaseController;
use Domain\Category\Actions\UpsertCategoryAction;
use Domain\Category\DataTransferObjects\CategoryData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryController extends BaseController
{
    public function store(CategoryData $categoryData, UpsertCategoryAction $action): JsonResponse
    {
        $category = $action->execute($categoryData);
        return response()->json($category, Response::HTTP_CREATED);
    }

    public function update(CategoryData $categoryData, UpsertCategoryAction $action): JsonResponse
    {
        $category = $action->execute($categoryData);
        return response()->json($category, Response::HTTP_CREATED);
    }
}
