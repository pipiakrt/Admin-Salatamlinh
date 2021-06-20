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
        'product_id',
        'number',
        'total_money',
        'name',
        'slug',
        'avatar',
        'price',
        'discount',
        'status',
    ];

    public function filterType(EloquentBuilder $query, $value)
    {
        $query->where('type', $value);
        return $query;
    }
}
