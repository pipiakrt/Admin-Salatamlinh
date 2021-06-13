<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHightlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
    ];
    
    protected $primaryKey = '_id';
    public $timestamps = false;

    public function Product()
    {
        return $this->hasOne(Product::class, '_id', 'product_id');
    }
}
