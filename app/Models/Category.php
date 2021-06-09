<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = '_id';

    protected $fillable = [
        'parent_id',
        'name',
        'slug'
    ];
}
