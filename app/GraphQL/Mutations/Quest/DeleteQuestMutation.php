<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Quest;

use App\Models\Quest;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Support\Facades\DB;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;

class DeleteQuestMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteQuest',
        'description' => 'A mutation'
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
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:quests']
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $data = Quest::findOrFail($args['id']);
        return $data->delete() ? true : false;
    }
}
