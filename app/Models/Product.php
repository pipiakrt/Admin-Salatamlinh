<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'number',
        'description',
        'content',
        'status',
        'category_id',
        'seo_title',
        'seo_description',
        'seo_keyword',
        'attributes',
        'promotion_id',
    ];

    protected $casts = [
        'status' => 'boolean',
        'images' => 'array',
        'attributes' => 'array',
    ];

    public $filterable = [
        '_id',
    ];

    public function Promotion() {
        return $this->hasOne(Promotion::class, '_id', 'promotion_id');
    }

    public function Suggestion() {
        return $this->hasMany(Suggestion::class, 'relate_id');
    }

    public function filterOrder(EloquentBuilder $query, $value)
    {
        $query->orderBy('_id', $value);
        return $query;
    }

    public function filterStatus(EloquentBuilder $query, $value)
    {
        $query->where('status', $value);
        return $query;
    }

    public function filterCategory(EloquentBuilder $query, $value)
    {
        $query->where('category_id', $value);
        return $query;
    }

    public function filterName(EloquentBuilder $query, $value)
    {
        $query->where('name', 'like', '%' . $value . '%');
        return $query;
    }

    public function filterPrice(EloquentBuilder $query, $value)
    {
        $query->orderBy('price', $value);
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