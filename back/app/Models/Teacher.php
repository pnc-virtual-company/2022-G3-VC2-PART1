<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Teacher extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'remember_token',
    ];

    public function accepted()
    {
        return $this->hasMany(Accepted::class);
    }

    public function request()
    {
        return $this->hasMany(StudentRequest::class);
    }

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["student", "teacher"][$value],
        );
    }
}
