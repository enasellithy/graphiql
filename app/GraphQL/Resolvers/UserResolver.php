<?php

namespace App\GraphQL\Resolvers;

use App\Models\Quest;
use Rebing\GraphQL\Support\Resolve;
use Rebing\GraphQL\Support\Facades\GraphQL;
class UserResolver extends Resolve
{
    public function type(): \GraphQL\Type\Definition\Type
    {
        return Type::listOf(GraphQL::type('Quest'));
    }

    public function arags(): array
    {
        return [
            'page' => [
                'type' => Type::int(),
                'description' => 'The page number for pagination',
            ],
            'perPage' => [
                'type' => Type::int(),
                'description' => 'The number of items per page',
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $query = Quest::query();
        if(isset($args['page']) && isset($args['perPage'])){
            return $query->paginate($args['perPage'], ['*'],'page', $args['page']);
        }
        return $query->get();
    }
}
