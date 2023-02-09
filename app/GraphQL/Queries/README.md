# Queries

This folder contain the classes that fetch data from the database.

## How to Define the Queries for Your Model

For each model we will have two queries:

- A class to query a single model
- A class to query a list of models

## Sample Class Skeleton

```php
<?php

// app/graphql/queries/category/CategoryQuery 

namespace App\GraphQL\Queries\Category;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'category',
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
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Category::findOrFail($args['id']);
    }
}
```

- Our query classes will inherit from `Rebing\GraphQL\Support\Query`
- The `attributes` function is used as the query configuration.
- The `type` function is used to declare what type of object this query will return.
- The `args` function is used to declare what arguments this query will accept. In our case we only need the id of the quest.
- The `resolve` function does the bulk of the work – it returns the actual object using eloquent.