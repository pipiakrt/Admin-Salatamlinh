<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use Filterable;

    protected $primaryKey = '_id';
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'number',
        'total_money',
        'name',
        'slug',
        'avatar',
        'price',
        'discount',
    ];

    public function filterType(EloquentBuilder $query, $value)
    {
        $query->where('type', $value);
        return $query;
    }
}
