<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Category;

use App\Models\Category;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Support\Facades\DB;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;

class CreateCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createCategory',
        'description' => 'Creates a category'
    ];

    public function type(): Type
    {
        return GraphQL::type('Gategory');
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $cats = Category::create($args);
        return $cats;
    }
}
