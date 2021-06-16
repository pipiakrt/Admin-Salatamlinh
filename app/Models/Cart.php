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
        'user_id',
        'product_id',
        'number',
    ];

    public function filterType(EloquentBuilder $query, $value)
    {
        $query->where('type', $value);
        return $query;
    }
}
