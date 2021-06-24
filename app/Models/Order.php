<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Order extends Model
{
    use HasFactory, Filterable;

    protected $primaryKey = '_id';

    protected $fillable = [
        'user_id',
        'code',
        'total_money',
        'status',
        'payment'
    ];

    public function User() {
        return $this->hasOne(Account::class, 'id', 'user_id');
    }

    public function Detail() {
        return $this->hasMany(OrderDetail::class, 'order_id');
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

    public function filterPrice(EloquentBuilder $query, $value)
    {
        $query->orderBy('total_money', $value);
        return $query;
    }

    public function filterPriceUp(EloquentBuilder $query, $value)
    {
        $query->where('total_money', '>=', $value);
        return $query;
    }

    public function filterPriceDown(EloquentBuilder $query, $value)
    {
        $query->where('total_money', '<=', $value);
        return $query;
    }
}
