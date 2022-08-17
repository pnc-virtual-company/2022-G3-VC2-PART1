<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function accepted()
    {
        return $this->hasMany(Accepted::class);
    }

    public function request()
    {
        return $this->hasMany(StudentRequest::class);
    }
}
