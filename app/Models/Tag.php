<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];
    public $timestamps = false;

    function articles():BelongsToMany{
        return $this->belongsToMany(Article::class);
    }
}
