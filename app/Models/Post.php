<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Filterable;

    protected $primaryKey = '_id';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'content',
        'status',
        'seo_title',
        'seo_description',
        'seo_keyword',
        'category_id'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

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
}
