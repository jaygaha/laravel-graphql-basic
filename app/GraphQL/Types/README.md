# Types

You can think of this as a model, or a model resource. Basically types are objects that can be fetched from the database. For example, we are going to have a `QuestType` and a `CategoryType`.

## How to define Types

Here is where we will use the `rebing/graphql-laravel` package which basically helps us create types, queries, and mutations.

Our types will inherit the Type class from `Rebing\GraphQL\Support\Type`. There's also another class called Type in the package but it's used to declare the type of field (like string, int, and so on).

## Sample Class Skeleton

```php
<?php

// app/graphql/types/CategoryType 

namespace App\GraphQL\Types;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Category',
        'description' => 'Collection of categories',
        'model' => Category::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of quest'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the quest'
            ],
            'quests' => [
                'type' => Type::listOf(GraphQL::type('Quest')), // we don't associate the class directly – we instead use its name from its attribute.
                'description' => 'List of quests'
            ]
        ];
    }
}
```

- `Attributes`: This is your type configuration. It has core information about your type, and to which model it associates.
- `Fields`: This method returns the fields that your client can ask for.