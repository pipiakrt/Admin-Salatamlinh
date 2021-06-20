<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Order extends Model
{
    use Filterable;

    protected $primaryKey = '_id';

    protected $fillable = [
        'user_id',
        'number',
        'total_money',
        'name',
        'slug',
        'avatar',
        'images',
        'video',
        'price',
        'discount',
        'description',
        'content',
        'category_id',
        'owner_id',
        'seo_title',
        'seo_description',
        'seo_keyword',
        'attributes',
        'status',
    ];

    public function filterType(EloquentBuilder $query, $value)
    {
        $query->where('type', $value);
        return $query;
    }
}
