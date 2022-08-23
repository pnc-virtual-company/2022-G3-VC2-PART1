<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    use HasFactory;
    protected $casts = [ 
       'created_at' => "datetime:D d F Y",    
       'end_date' => "datetime:D d F Y",    
       'start_date' => "datetime:D d F Y",    
    ]; 



    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function approve()
    {
        return $this->belongsTo(Accepted::class);
    }
}
