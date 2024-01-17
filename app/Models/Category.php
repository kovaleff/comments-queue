<?php

namespace App\Models;

use App\Models\Product as ProductAlias;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',

    ];
    public $timestamps = false;

    public function products(): HasMany
    {
        return $this->hasMany(ProductAlias::class);
    }

    function scopeActive(Builder $query): void{
        $query->where('active', 1);
    }
}
