<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'profile', 'posts'
    ];
    
    protected $defaultIncludes = [];
    
    public function transform(User $user)
    {
        return [
            'username' => 'light',
            'transformer' => __CLASS__,
        ];
    }
    
    public function includePosts(User $user)
    {
        return $this->collection($user->getPosts(), new PostTransformer());
    }
}
