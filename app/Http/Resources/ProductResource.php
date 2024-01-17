<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use TiMacDonald\JsonApi\JsonApiResource;

class ProductResource extends JsonApiResource
{
    public $attributes = [
        'name',
        'website',
        'twitter_handle',
    ];

    public $relationships = [
        'category' => CategoryResource::class,
        'posts' => PostResource::class,
    ];
}
