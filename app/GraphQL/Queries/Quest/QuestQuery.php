<?php

namespace App\GraphQL\Queries\Quest;

use App\Models\Quest;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class QuestQuery extends Query
{
    /**
     * Query configuration.
     * 
     * @var mixed
     */
    protected $attributes = [
        'name' => 'quest',
    ];

    /**
     * Declare what type of object this query will return.
     * 
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('Quest');
    }

    /**
     * Declare what arguments this query will accept. 
     * In our case we only need the id of the quest.
     * 
     * @return array
     */
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

    /**
     * Does the bulk of the work 
     *  – it returns the actual object using eloquent.
     * @param mixed $root
     * @param mixed $args
     * @return mixed
     */
    public function resolve($root, $args)
    {
        return Quest::findOrFail($args['id']);
    }
}