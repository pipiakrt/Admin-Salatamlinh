<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Account extends Model
{
    use Notifiable;

    protected $table = 'accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'phone', 'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Cart() {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function Order() {
        return $this->hasMany(Order::class, 'user_id');
    }
}
