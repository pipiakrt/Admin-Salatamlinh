<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, Filterable;

    protected $primaryKey = '_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'link',
        'image',
        'type',
        'attributes',
    ];

    protected $casts = [
        'attributes' => 'array',
    ];

    public function filterType(EloquentBuilder $query, $value)
    {
        $query->where('type', $value);
        return $query;
    }
}
