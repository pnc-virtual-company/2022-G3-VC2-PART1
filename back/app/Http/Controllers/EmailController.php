<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\StudentRequest;


class EmailController extends Controller
{
    public function sendMail($id,$leaveType,$message)
    {
        $emails = Teacher::all(['email']);
        $studentRequest = StudentRequest::find($id);
        $student = Student::find($id);
        $username = $student['first_name'].' '.$student['last_name'];
        $msg = $message;
        $body = [
            'username' => $username,
            'details' => $msg,
            'leaveType' => $leaveType,
        ];

        foreach ($emails as $email) {
            Mail::to($email)->send(new sendMail($body));//file in Mail folder
        }

    }
}
