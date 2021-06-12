<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Jenssegers\Mongodb\Eloquent\Model as MongoDB;
use Illuminate\Database\Eloquent\Model as MySQL;

class Product extends MySQL
{
    use HasFactory, Filterable;

    protected $primaryKey = '_id';

    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'images',
        'video',
        'price',
        'discount',
        'description',
        'content',
        'status',
        'category_id',
        'owner_id',
        'seo_title',
        'seo_description',
        'seo_keyword',
        'attributes',
    ];

    protected $casts = [
        'status' => 'boolean',
        'images' => 'array',
        'attributes' => 'array',
    ];

    public $filterable = [
        '_id',
    ];

    public function filterStatus(EloquentBuilder $query, $value)
    {
        $query->orderBy('_id', 'desc');
        return $query;
    }

    public function filterDesc(EloquentBuilder $query, $value)
    {
        $query->orderBy('_id', 'desc');
        return $query;
    }

    public function filterAsc(EloquentBuilder $query, $value)
    {
        $query->orderBy('_id', 'asc');
        return $query;
    }

    public function filterCategory(EloquentBuilder $query, $value)
    {
        $query->whereHas('categories', function($q) use ($value){
            $q->where('_id', $value);
        });
        return $query;
    }

    public function filterName(EloquentBuilder $query, $value)
    {
        $query->where('name', 'like', '%' . $value . '%');
        return $query;
    }

    public function filterPriceUp(EloquentBuilder $query, $value)
    {
        $query->where('price', '>=', $value);
        return $query;
    }

    public function filterPriceDown(EloquentBuilder $query, $value)
    {
        $query->where('price', '<=', $value);
        return $query;
    }
}