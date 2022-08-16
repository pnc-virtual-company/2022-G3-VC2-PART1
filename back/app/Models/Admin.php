<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public function teacher($user)
    {
        return $this->hasMany(Teacher::class);
    }

    public function student($user)
    {
        return $this->hasMany(Teacher::class);
    }

    
}
