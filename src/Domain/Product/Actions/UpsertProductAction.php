<?php
namespace Domain\Product\Actions;

use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Models\Product;

class UpsertProductAction
{
    public function execute(ProductData $data, ?int $id = null): Product
    {
        return Product::updateOrCreate(
            [
                "id" => $id
            ],
            [
                'name' => $data->name,
                'description' => $data->description,
                'price' => $data->price->cent,
                'category_id' => $data->category->id,
            ]
        );
    }
}
