<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles; // Import HasRoles trait



class Guardian extends Model
{
    use HasFactory;
    use HasRoles; // Add HasRoles trait

 public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->hasMany(Child::class);
    }
    
}
