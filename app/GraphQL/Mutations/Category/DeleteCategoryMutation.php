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
class DeleteCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteCategory',
        'description' => 'deletes a category'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $cats = Category::findOrFail($args['id']);
        return $cats->delete() ? true : false;
    }
}
