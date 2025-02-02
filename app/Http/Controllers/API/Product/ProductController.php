<?php

namespace App\Http\Controllers\API\Product;
use App\Http\Controllers\API\BaseController;
use Domain\Product\Actions\UpsertProductAction;
use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends BaseController
{
    public function all_products_with_pagination($perPage = 10)
    {
        $paginatedProducts = Product::paginate($perPage);
        $products = $paginatedProducts->getCollection()->map(fn($product) => ProductData::from($product));
        $paginatedProducts->setCollection($products);
        return response()->json($paginatedProducts, Response::HTTP_OK);
    }
    public function all_products_without_pagination()
    {
        $products = Product::all()->map(fn($p) => ProductData::from($p));
        return response()->json($products, Response::HTTP_OK);
    }

    public function store(Request $request, UpsertProductAction $action): JsonResponse
    {
        $productData = ProductData::from($request);
        $product = $action->execute($productData);
        return response()->json(ProductData::from($product), Response::HTTP_CREATED);
    }

    public function update(Request $request, UpsertProductAction $action, int $id): JsonResponse
    {
        $product = $action->execute(ProductData::from($request->merge(['id' => $id])), $id);
        return response()->json(ProductData::from($product), Response::HTTP_CREATED);
    }
}
