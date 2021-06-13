<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHightlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
    ];
    
    protected $primaryKey = '_id';
    public $timestamps = false;

    public function Category()
    {
        return $this->hasOne(Category::class, '_id', 'category_id');
    }
}
