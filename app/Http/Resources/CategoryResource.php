<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use TiMacDonald\JsonApi\JsonApiResource;

class CategoryResource extends JsonApiResource
{
    public $attributes = [
        'title',
    ];

    public $relationships = [
        'products' => ProductResource::class,
    ];
}
