<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishCategory extends Model
{
    use HasFactory;


protected $fillable = [
        'name',
        ];

    public function wishes()
    {
        return $this->hasMany(Wish::class, 'category_id');
    }
}
