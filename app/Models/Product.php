<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Jenssegers\Mongodb\Eloquent\Model as MongoDB;
use Illuminate\Database\Eloquent\Model as MySQL;

class Product extends MySQL
{
    use HasFactory;

    protected $primaryKey = '_id';

    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'video',
        'price',
        'discount',
        'description',
        'content',
        'status',
        'category_id',
        'owner_id',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}