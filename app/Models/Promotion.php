<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory, Filterable;

    protected $primaryKey = '_id';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'type',
        'number',
        'code',
        'start',
        'end',
    ];

    protected $casts = [
        'type' => 'boolean',
    ];

    public function filterOrder(EloquentBuilder $query, $value)
    {
        $query->orderBy('_id', $value);
        return $query;
    }

    public function filterName(EloquentBuilder $query, $value)
    {
        $query->where('name', 'like', '%' . $value . '%');
        return $query;
    }
}
