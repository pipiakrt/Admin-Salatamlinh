<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'relate_id',
        'product_id',
    ];
    
    public $timestamps = false;

    public function Product() {
        return $this->hasOne(Product::class, '_id', 'relate_id');
    }
}