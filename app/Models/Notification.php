<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as MySQL;

class Notification extends MySQL
{
    use HasFactory, Filterable;

    protected $primaryKey = '_id';

    protected $fillable = [
        'avatar',
        'title',
        'description',
        'link',
    ];

    public function filterOrder(EloquentBuilder $query, $value)
    {
        $query->orderBy('_id', $value);
        return $query;
    }

    public function filterName(EloquentBuilder $query, $value)
    {
        $query->where('title', 'like', '%' . $value . '%');
        return $query;
    }
}
