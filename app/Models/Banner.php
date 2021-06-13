<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model as MySQL;

class Banner extends MySQL
{
    use HasFactory;
    
    protected $primaryKey = '_id';
    
    protected $fillable = [
        'path',
        'link',
    ];
    
    public $timestamps = false;
}
