<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Passport\HasApiTokens;
use Laravel\Sanctum\HasApiTokens;
// use Laravel\Sanctum\Contracts\HasApiTokens;
class Student extends Model
{
    use HasFactory, HasApiTokens;
    public function dayOff()
    {
        return $this->hasMany(StudentRequest::class);
    }

    public function approve()
    {
        return $this->hasMany(Accepted::class);
    }

}
