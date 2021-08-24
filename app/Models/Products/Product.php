<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'is_active',
        'sort',
        'img',
        'price',
        'brand_name',
        'inner_diameter',
        'external_diameter',
        'width',
        'analogs',
        'weight',
        'description',
    ];
}
