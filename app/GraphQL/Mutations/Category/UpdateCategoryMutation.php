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

class UpdateCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateCategory',
        'description' => 'Updates a category'
    ];

    public function type(): Type
    {
        return GraphQL::type('Category');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'title' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $cats = Category::findOrFail($args['id']);
        $cats->fill($args);
        $cats->save();
        return $cats;
    }
}
