<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountFacebook extends Model
{
    use HasFactory;
    
    protected $primaryKey = '_id';
    
    protected $fillable = [
        'fb_id',
        'token',
    ];
    
    public $timestamps = false;
}
