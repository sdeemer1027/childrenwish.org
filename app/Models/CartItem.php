<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'wish_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wish()
    {
        return $this->belongsTo(Wish::class);
    }
}
