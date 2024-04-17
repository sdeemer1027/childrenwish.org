<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    use HasFactory;
protected $casts = [
    'expiration_date' => 'date',
];

protected $fillable = [
        'child_id',
        'description',
        'name',
        'value',
        'category_id',
        'expiration_date',
'fulfilled',
'originalvalue',
    ];


 public function child()
    {
        return $this->belongsTo(Child::class);
    }

    public function category()
    {
        return $this->belongsTo(WishCategory::class, 'category_id');
    }

}
