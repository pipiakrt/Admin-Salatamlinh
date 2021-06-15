<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as MySQL;

class Banner extends MySQL
{
    use HasFactory;
    
    protected $primaryKey = '_id';
    
    protected $fillable = [
        'name',
        'path',
        'link',
    ];
    
    public $timestamps = false;
}
