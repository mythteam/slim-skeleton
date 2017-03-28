<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class ThumbnailTransformer extends TransformerAbstract
{
    public function transform($thumbnail)
    {
        return __CLASS__;
    }
}
