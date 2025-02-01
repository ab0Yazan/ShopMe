<?php

namespace Domain\Category\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $description,
    ){}

    public static function rules(Request $request): array
    {
        $rules =  [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ];

        if ($request->isMethod('PUT')) {
            $rules['id'] = ['required', 'integer', 'exists:categories,id'];
        }

        return $rules;
    }
}
