<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class OrderDetail extends Model
{
    use HasFactory, Filterable;

    protected $primaryKey = '_id';
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'category_id',
        'number',
        'total_money',
        'name',
        'slug',
        'avatar',
        'price',
        'discount',
    ];

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
}
