<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    use HasFactory;
    protected $casts = [ 
    
       'updated_at' => "datetime:D d F Y h:i a",    
       'created_at' => "datetime:D d F Y H:i a",    
       'end_date' => "datetime:D d F Y h:i a",    
       'start_date' => "datetime:D d F Y h:i a",    
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
