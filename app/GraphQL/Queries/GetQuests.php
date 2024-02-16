<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Quest;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use App\GraphQL\Inputs\PaginationInput;

class GetQuests extends Query
{
    protected $attributes = [
        'name' => 'getQuests',
    ];

    public function type(): Type
    {
        return GraphQL::paginate('QuestType');
    }

    public function args(): array
    {
        return [
            'pagination' => [
                'name' => 'pagination',
                'type' => GraphQL::type('PaginationInput'),
                'description' => 'Pagination options',
            ],
        ];
    }

    public function resolve($root, $args, $context, Closure $getSelectFields)
    {
        $limit = $args['pagination']['limit'] ?? 10;

        return Quest::paginate($limit);
    }
}
