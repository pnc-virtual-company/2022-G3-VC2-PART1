<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public function dayOff()
    {
        return $this->hasMany(StudentRequest::class);
    }

    public function approve()
    {
        return $this->hasMany(Accepted::class);
    }

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["student", "teacher"][$value],
        );
    }

}
