<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostHot extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
    ];
    
    protected $primaryKey = '_id';
    public $timestamps = false;

    public function Post()
    {
        return $this->hasOne(Post::class, '_id', 'post_id');
    }
}
