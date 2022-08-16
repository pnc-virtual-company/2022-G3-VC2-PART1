<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function dayOff()
    {
        return $this->hasMany(StudentRequest::class);
    }

    public function approve()
    {
        return $this->hasMany(Accepted::class);
    }

}
