<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class PaginationInput extends InputType
{
    protected $attributes = [
        'name' => 'PaginationInput',
        'description' => 'An example input',
    ];

    public function fields(): array
    {
        return [
            'limit' => [
                'type' => Type::int(),
                'description' => 'Number of items per page',
            ],
        ];
    }
}
