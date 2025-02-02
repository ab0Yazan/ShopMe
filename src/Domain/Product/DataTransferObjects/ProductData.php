<?php
namespace Domain\Product\DataTransferObjects;

use Domain\Category\DataTransferObjects\CategoryData;
use Domain\Category\Models\Category;
use Domain\Product\Models\Product;
use Domain\Shared\ValueObjects\Price;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class ProductData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $description,
        public readonly Price $price,
        public readonly null|Lazy|CategoryData $category
    ) {}

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'id' => $request->method() === 'PUT' ? $request->id : null,
            'name' => $request->name,
            'description' => $request->description,
            'price' => Price::from($request->price),
            'category' => CategoryData::from(Category::find($request->category_id)),
        ]);
    }

    public static function fromModel(Product $product): self
    {
        return self::from([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'category' => CategoryData::from(Category::find($product->category_id)),
        ]);
    }
}
