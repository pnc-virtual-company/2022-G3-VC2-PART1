<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function dayOff()
    {
        return $this->hasMany(StudentRequest::class);
    }

    protected $hidden=[
        "password",
        "email",
        "phone"
    ];
     



}
