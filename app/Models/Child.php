<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

 protected $fillable = [
        'name',
        'age',
        'guardian_id',
        'type',
        'illness',
        

    ];



     public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }
    public function wishes()
    {
        return $this->hasMany(Wish::class);
    }

    public function wishItems()
    {
        return $this->hasMany(WishItem::class);
    }

    
}
