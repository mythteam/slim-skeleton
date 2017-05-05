<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'thumbnails',
    ];

    protected $defaultIncludes = [
        //'thumbnails'
    ];

    public function transform($post)
    {
        return array_merge($post, ['transformer' => __CLASS__]);
    }

    public function includeThumbnails($post)
    {
        //$post->getThumbnails();

        return $this->collection([
            ['id' => 1],
            ['id' => 2],
        ], new ThumbnailTransformer());
    }
}
