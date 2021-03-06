<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as MySQL;

class Slider extends MySQL
{
    use HasFactory;

    protected $primaryKey = '_id';
    
    protected $fillable = [
        'path',
        'link',
    ];
    
    public $timestamps = false;
}
