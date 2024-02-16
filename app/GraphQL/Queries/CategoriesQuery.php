<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Category;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CategoriesQuery extends Query
{
    protected $attributes = [
        'name' => 'categories',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Category'));
    }


    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Category::all();
    }
}
