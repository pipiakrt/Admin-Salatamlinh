<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = '_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'link',
        'type',
        'attributes',
    ];

    protected $casts = [
        'attributes' => 'array',
    ];

}
