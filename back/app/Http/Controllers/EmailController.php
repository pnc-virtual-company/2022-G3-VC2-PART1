<?php

namespace App\Http\Controllers;

use App\Mail\sendMail;
use App\Mail\mailToStudent;
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
        $email = $student['email'];
        $days = (int)date('d', strtotime($student['start_date'])) - (int)date('d', strtotime($student['end_date']));
        $start_date = date('y-m-d', strtotime($student['start_date']));
        $end_date = date('y-m-d', strtotime($student['end_date']));
        if($days  == 0){
            $days = 'Half';
        }
        $body = [
            'username' => $username,
            'details' => $msg,
            'leaveType' => $leaveType,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'email' => $email,
            'days' => $days,
        ];

        foreach ($emails as $eml) {
            Mail::to($eml)->send(new sendMail($body));//file in Mail folder
        }

    }

    public function mailToStudent($id, $status)
    {
        $studentRequest = StudentRequest::find($id);
        $student = Student::find($studentRequest['student_id']);
        $username = $student['first_name'] . ' ' . $student['last_name'];
        $email = $student['email'];
        $studentRequest['status'] = $status;
        $body = [
            'username' => $username,
            'status' => $status,
        ];

        Mail::to($email)->send(new mailToStudent($body)); //file in Mail folder
        return 'success';

    }
}
