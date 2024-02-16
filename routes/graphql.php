<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::graphql([
    'query' => [
        'users' => \App\GraphQL\Queries\UserQuery::class,
    ],
]);
