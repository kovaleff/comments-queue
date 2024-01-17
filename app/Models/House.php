<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name', 'price', 'bedrooms', 'bathrooms' , 'storeys' , 'garages'
    ];

}
