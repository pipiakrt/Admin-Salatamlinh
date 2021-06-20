<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use Filterable;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'user_id',
        'number',
        'name',
        'slug',
        'avatar',
        'price',
        'discount'
    ];

    public function filterType(EloquentBuilder $query, $value)
    {
        $query->where('type', $value);
        return $query;
    }
}
