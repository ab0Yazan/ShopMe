<?php

namespace Domain\Category\DataTransferObjects;

use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $description,
    ){}

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ];
    }
}
