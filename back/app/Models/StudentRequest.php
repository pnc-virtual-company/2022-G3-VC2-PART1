<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    use HasFactory;
    protected $casts = [
       'updated_at' => "datetime:d/M/Y",
       'created_at' => "datetime:d/M/Y",
       'end_date' => "datetime:d/M/Y",
       'start_date' => "datetime:d/M/Y",

    ];



    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // public function approve()
    // {
    //     return $this->belongsTo(Accepted::class);
    // }
}
