<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Jenssegers\Mongodb\Eloquent\Model as MongoDB;
use Illuminate\Database\Eloquent\Model as MySQL;

class Slider extends MySQL
{
    use HasFactory;

    protected $primaryKey = '_id';
    
    protected $fillable = [
        'path',
    ];
    
    public $timestamps = false;
}
