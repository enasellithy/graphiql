<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\GraphQL\Middleware\Logstash;
use App\GraphQL\Middleware\ResolvePage;
use App\Models\Quest;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class QuestsQuery extends Query
{
    protected $attributes = [
        'name' => 'quests',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Quest'));
    }

    public function resolve($root, $args, $context, Closure $getSelectFields)
    {
        return Quest::get();
    }
}
