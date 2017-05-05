<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'profile', 'posts',
    ];

    protected $defaultIncludes = [];

    public function transform(User $user)
    {
        return [
            'username'    => $user->username,
            'email'       => $user->email,
            'attributes'  => $user->toArray(),
            'transformer' => __CLASS__,
        ];
    }

    public function includePosts(User $user)
    {
        return $this->collection($user->getPosts(), new PostTransformer());
    }
}
