# Mutation

This folder contain classes that manage the insert, update, and delete operations.

## How to Create the Mutation Classes

Mutations will house our classes that control the insertion/deletion of our models. So for each model we will have three classes:

- A class to create a model like `CreateCategoryMutation`
- A class to update a model like `UpdateCategoryMutation`
- A class to delete a model like `DeleteCategoryMutation`

## Sample Class Skeleton

```php
<?php

// app/graphql/mutations/category/CreateCategoryMutation 

namespace App\GraphQL\Mutations\Category;

use App\Models\Category;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createCategory',
        'description' => 'Creates a category'
    ];

    public function type(): Type
    {
        return GraphQL::type('Category');
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $category = new Category();
        $category->fill($args);
        $category->save();

        return $category;
    }
}
```

The structure is very similar to our queries.

- Our mutation classes will inherit from `Rebing\\GraphQL\\Support\\Mutation`
- The `attributes` function is used as mutation configuration.
- The `type` function is used to declare what type of object this query will return.
- The `args` function is used to declare what arguments this mutation will accept. In our case we only need the `title` field.
- The `resolve` function does the bulk of the work – it does the actual mutation using eloquent.

